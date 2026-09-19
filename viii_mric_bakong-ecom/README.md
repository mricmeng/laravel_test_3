## I Project Setup Laravel
#### -បង្កើត folderName: Payment

1. **Open terminal:**
   ```bash
   composer global require laravel/installer

   laravel new bakong_qr

   cd bakong_qr

   php artisan serve
   ```
2. **Install Bakong Packages:**
   ```bash
   open chrome url: ( https://packagist.org/packages/khqr-gateway/bakong-khqr-php )
   copy ( composer require khqr-gateway/bakong-khqr-php )->(past into Terminal)
   copy ( composer require simplesoftwareio/simple-qrcode )->(past into Terminal)

   ```

3. **Database Setup:**
    ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE= laravel_bankong_payment
        DB_USERNAME=root
        DB_PASSWORD=
    ```

4. **open Terminal**
    ```bash
    php artisan mrigrate
    php artisan make:model Product -m
    ```

5. **find folder (migration->products_table)**
    ```bash
    {
        Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description')->nullable();
                $table->decimal('price', 10,2);
                $table->string('image')->nullable();
                $table->timestamps();
        });
    }
    ```

6. **open Terminal**
    ```bash
    php artisan migrate
    ```

7. **find folder->Models->Product**
    ```bash
    class Product extends Model
    {
        protected $fillable = [
            'name',
            'description',
            'price',
            'image',
        ];
    }
    ```

8. **open Terminal**
    ```bash
    php artisan make:controller ProductController
    ```

9. **find folder-> ProductController**
    ```bash
    class ProductController extends Controller
        {
            public function index(){
                $products = Product::all();
                return view('products.index', compact('products'));
            }

            public function show($id){
                $product = Product::findOrFail($id);
                return view('products.show', compact('product'));
            }
        }
    ````

10. **Register Bakong api**
    ```bash
    open google : (Babong open api)
    in form: 
    -Organization: software
    -Project : Ecom
    -email: .....@gmail
    -check email->verify->copy token
    ```
11. **open Terminal**
    ```bash
    php artisan make:controller PaymentController
    ```

12. **find folder->PaymentController**
    ```bash
    <?php

    namespace App\Http\Controllers;

    use App\Models\Product;
    use Illuminate\Http\Request;
    use KHQR\BakongKHQR;
    use KHQR\Helpers\KHQRData;
    use KHQR\Models\IndividualInfo;


    class PaymentController extends Controller
    {
        public function checkout($id)
        {

            $product = Product::findOrFail($id);

            $merchant = new IndividualInfo(
                bakongAccountID: 'cocobank@bkrt',
                merchantName: 'Meng Chomraoen',
                merchantCity: 'Phnom Penh',
                // currency: KHQRData::CURRENCY_KHR,
                currency: KHQRData::CURRENCY_USD,
                amount: $product->price
            );

            $qrResponse = BakongKHQR::generateIndividual($merchant);

            return view('products.checkout', [
                'product' => $product,
                'qr' => $qrResponse->data['qr'] ?? null,
                'md5' => $qrResponse->data['md5'] ?? null,
            ]);
        }

        public function verifyForm(){
            return view('payments.verify');
        }

        public function verifyTransaction(Request $request){

            $request->validate([
                'md5' => 'required|string'
            ]);

            try{
                $token = env('BAKONG_TOKEN');

                $bakong = new BakongKHQR($token);
                $result = $bakong->checkTransactionByMD5($request->md5);

                return response()->json($result);

            }catch(\Exception $e){

                return response()->json([
                    'error' => $e->getMessage()
                ],500);

            }
        }

        public function paymentResult(){
            return view('payments.result');
        }
    }
    ```
13. **find env**
    ```bash
    BAKONG_TOKEN = (token from email by bakong open api);
    ```

14. **find folder views->create_folder(layouts)->create_file(app.blacde.php)**
    ```bash
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Phone Shop</title>
    </head>
    <body>
        <div>
            <h1>Phone shop</h1>
            <p>Secure digital payment experience</p>
        </div>
        <div>
            @yield('content')
        </div>
    </body>
    </html>
    ```

15. **find folder views->create_folder(products)**

* **create_file(index.blacde.php)**
    ```bash
    @extends('layouts.app')

    @section('content')
        <div>
            <h1>Product List</h1>

            <div>
                @foreach ($products as $product)
                    <div>
                        <div>
                            <h5>{{$product->name}}</h5>

                            <p>{{$product->description}}</p>

                            <p>
                                <strong>
                                    ${{number_format($product->price, 2)}}
                                </strong>
                            </p>

                            <a href="{{route('product.show', $product->id)}}">
                                Buy
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
    ```

* **create_file(show.blacde.php)**
    ```bash 
    @extends('layouts.app')

    @section('content')
        <div>
            <h2>{{$product->name}}</h2>

            <img src="{{$product->image}}">

            <p>{{$product->description}}</p>

            <div>
                ${{ number_format($product->price, 2)}}
            </div>

            <form action="{{ route('checkout', $product->id)}}" method="POST">
                @csrf
                <button>
                    Generate KHQR Pay
                </button>
            </form>
        </div>
    @endsection
    ```

* **create_file(checkout.blacde.php)**
    ```bash
    @extends('layouts.app')

    @section('content')
        <h2>Scan KHQR</h2>

        <p>
            <strong>{{$product->name}}</strong>
            <span>${{ number_format($product->price, 2)}}</span>
        </p>

        @if ($qr)
            <div>
                {!! QrCode::size(220)->generate($qr) !!}
            </div>  
        @else
            <div>
                Failed to Generate QR
            </div>
        @endif

        <div>
            <div id="countdown">120</div>
            <small>
                Expire in <span id="seconds">120</span>
            </small>

            <a href="{{route('home')}}">
                back
            </a>
        </div>

        <script>
            let timeLeft = 120;

            const countdownElement = document.getElementById('countdown');
            const secondsText = document.getElementById('seconds');

            const timer = setInterval(() => {
                timeLeft--;

                countdownElement.textContent = timeLeft;
                secondsText.textContent = timeLeft;

                if(timeLeft > 0){
                    fetch("{{ route('verify.transaction') }}",{
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            md5: "{{$md5}}"
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if(data.responseCode === 0){
                            clearInterval(timer);
                            alert("Transaction successful!");
                            window.location.href = "{{ route('home') }}";
                        }else if(data.failed){
                            clearInterval(timer);
                            alert("Transaction failed. please try again.");
                            window.location.href = "{{ route('home')}}";
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    })
                }

                if(timeLeft <= 0){
                    clearInterval(timer);
                    alert('QR expired.');
                    window.location.href = "{{ route('home') }}"
                }
            }, 1000);
        </script>
    @endsection
    ```

16. **find folder views->create_folder(payments)**

* **create_file(result.blacde.php)**
    ```bash
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Payment Result</title>
    </head>
    <body>
        <h1>Payment Successful</h1>

        <p>Your payment successful</p>

        <a href="{{route('home')}}">
            Back to home
        </a>
        
    </body>
    </html>
    ```

17. **find folder route->into_file web.php**
    ```bash
    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\PaymentController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/', [ProductController::class, 'index'])->name('home');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/checkout/{id}', [PaymentController::class, 'checkout'])->name('checkout');
    Route::get('/verify', [PaymentController::class, 'verifyForm'])->name('verify.form');
    Route::post('/verify', [PaymentController::class, 'verifyTransaction'])->name('verify.transaction');
    Route::get('/payments/result', [PaymentController::class, 'paymentResult'])->name('payments.result');
    ```

















sample

# Product Catalog API / Web App

A brief description of what this project does. This is a Laravel-based application for managing and viewing products.

## 🚀 Features
* **List Products:** View all available products via the `index` method.
* **Product Details:** Fetch detailed information for a single product by its ID using `show`.

## 🛠️ Prerequisites
Before running this project, ensure you have installed:
* PHP >= 8.1
* Composer
* MySQL or PostgreSQL

## 💻 Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com
   cd product-app
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Configure environment:**
   Copy the example environment file and set up your database credentials.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run migrations and seeders:**
   ```bash
   php artisan migrate --seed
   ```

5. **Start the local server:**
   ```bash
   php artisan serve
   ```

## 🔌 Routing & Usage

### 1. View All Products
* **URL:** `/products`
* **Method:** `GET`
* **Controller Action:** `ProductController@index`

### 2. View a Specific Product
* **URL:** `/products/{id}`
* **Method:** `GET`
* **Controller Action:** `ProductController@show`

🛠️ Common Markdown Cheat Sheet
# Heading 1 (Main Title)
## Heading 2 (Sections)
* Bullet point (Lists)
1. Numbered item (Steps)
`inline code` (Highlighting variables or single commands)


