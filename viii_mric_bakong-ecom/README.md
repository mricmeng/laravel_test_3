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
    php artisan make:controller ProductController
    ```

7. **find folder-> ProductController**
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


