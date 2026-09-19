### 1 Project Setup Laravel
#### -បង្កើត folderName: Payment
#### -composer global require laravel/installer ->(past into Terminal)
#### -laravel new bakong_qr ->(past into Terminal)
#### -cd bakong_qr ->(past into Terminal)
#### -php artisan serve. ->(past into Terminal)

### 2 Install Bakong Packages
#### -open chrome url: ( https://packagist.org/packages/khqr-gateway/bakong-khqr-php )
#### -copy ( composer require khqr-gateway/bakong-khqr-php )->(past into Terminal)
#### -( composer require simplesoftwareio/simple-qrcode )->(past into Terminal)
 
### 3 env
###### DB_CONNECTION=mysql
###### DB_HOST=127.0.0.1
###### DB_PORT=3306
###### DB_DATABASE= laravel_bankong_payment
###### DB_USERNAME=root
###### DB_PASSWORD=

### 4 open Terminal
#### -php artisan mrigrate
#### -php artisan make:model Product -m

### 5 find folder (migration->products_table)
#####   {
#####       Schema::create('products', function (Blueprint $table) {
#####            $table->id();
#####            $table->string('name');
#####            $table->text('description')->nullable();
#####            $table->decimal('price', 10,2);
#####            $table->string('image')->nullable();
#####            $table->timestamps();
#####       });
#####    }

##### -php artisan migrate ->(past into terminal)
##### -php artisan make:controller ProductController
`
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
`

```
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

