# Laravel package for aamarpay payment gateway

Laravel aamarpay is a laravel package for aamarpay payment gateway.

## Installation

You can install the package via composer:

```bash
composer require yahrdy/aamarpay
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="aamarpay-config"
```

This is the contents of the published config file:

```php
return [
    'url' => env('AAMARPAY_SERVER_URL', 'https://sandbox.aamarpay.com/request.php'),
    'verify_url' => env('AAMARPAY_VERIFY_URL', 'https://sandbox.aamarpay.com/api/v1/trxcheck/request.php'),
    'store_id' => env('AAMARPAY_STORE_ID', 'aamarpaytest'),
    'signature_key' => env('AAMARPAY_SIGNATURE_KEY', 'dbb74894e82415a2f7ff0ec3a97e4183'),
    'success_url' => env('AAMARPAY_SUCCESS_URL', 'http://localhost:8000/api/verify'),
    'cancel_url' => env('AAMARPAY_CANCEL_URL', 'http://localhost:8000/api/verify'),
    'fail_url' => env('AAMARPAY_FAIL_URL', 'http://localhost:8000/api/verify'),
];
```

## Usage

```php
// Use the facade to initiate a payment, it will return a redirect url
public function checkout(){
        return Aamarpay::checkout($amount, $name, $address, $phone, $value1 = null, $value2 = null, $value3 = null, $value4 = null);
    }

// To verify the payment, keep the redirect post parameter in the request
// This will return a json response with the payment information
public function verify(Request $request){
        return Aamarpay::verify($request);
    }
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Yeasir Arafat](https://github.com/yeasirhridoy)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
