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
#### DB_CONNECTION=mysql
#### DB_HOST=127.0.0.1
#### DB_PORT=3306
#### DB_DATABASE= laravel_bankong_payment
#### DB_USERNAME=root
#### DB_PASSWORD=
