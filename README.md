


# Laravel PayPal Payment Integration

This repository demonstrates how to integrate PayPal payment functionality into a Laravel application using the [srmklive/paypal package/github](https://github.com/srmklive/laravel-paypal).


The documentation for the package can be viewed by clicking the following link:[srmklive/paypal package](https://srmklive.github.io/laravel-paypal/docs.html).
## Requirements

- Laravel 8.x or higher
- PHP 7.3 or higher
- Composer
- PayPal Developer Account for API credentials

## Installation

Follow these steps to set up PayPal payment integration in your Laravel application:

### 1. Install the Package

Run the following command to install the PayPal package via Composer:

```bash
composer require srmklive/paypal
```
### 2. Publish the Configuration File
Once the package is installed, publish the configuration file to your Laravel app:

```bash
Copy
php artisan vendor:publish --provider "Srmklive\PayPal\Providers\PayPalServiceProvider"
```
### 3. Configure PayPal API Credentials
In the config/paypal.php file, add your PayPal API credentials. These credentials can be obtained by creating a PayPal Developer account and setting up a sandbox account.

```bash
return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'secret' => env('PAYPAL_SECRET'),
    'settings' => [
        'mode' => env('PAYPAL_MODE', 'sandbox'), // 'sandbox' or 'live'
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path('logs/paypal.log'),
        'log.LogLevel' => 'INFO',
    ],
];
```
        
### 4. Add Environment Variables
Add the PayPal credentials to your .env file:

```bash
PAYPAL_CLIENT_ID=your-client-id
PAYPAL_SECRET=your-secret
PAYPAL_MODE=sandbox
```
### 5. Create the Controller
In your controller, create methods to handle PayPal payments. Here's an example of the controller (ProductController.php):

### 6. Define Routes
In the routes/web.php file, define the routes for the payment process:

