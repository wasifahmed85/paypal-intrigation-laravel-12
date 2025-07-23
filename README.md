


# Laravel PayPal Payment Integration

This repository demonstrates how to integrate PayPal payment functionality into a Laravel application using the [srmklive/paypal package/github](https://github.com/srmklive/laravel-paypal).


The documentation for the package can be viewed by clicking the following link:[srmklive/paypal package](https://srmklive.github.io/laravel-paypal/docs.html).
## Requirements

Important

Laravel 11 will be the last version supported for v3.0. v4 is being actively worked on, and will be released by end of October 2024. For v4, following are the changes being introduced:

PHP 8.1+ required.
Laravel 10 & onwards required.
Integration of PayPal JS SDK.
Symfony plugin.

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

php artisan vendor:publish --provider "Srmklive\PayPal\Providers\PayPalServiceProvider"
```
### 3. Configure PayPal API Credentials
In the config/paypal.php file, add your PayPal API credentials. These credentials can be obtained by creating a PayPal Developer account and setting up a sandbox account.

```bash
return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
        'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
        'app_id'            => 'APP-80W284485P519543T',
    ],
    'live' => [
        'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', ''),
        'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
        'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
    'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
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
In your controller, create methods to handle PayPal payments. Here's an example of the controller :


```bash
php artisan make:controller ProductController
```

### 6. Define Routes
In the (routes/web.php) file, define the routes for the payment process:

