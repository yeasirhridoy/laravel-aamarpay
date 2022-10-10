<?php

// config for Yahrdy/Aamarpay
return [
    'url' => env('AAMARPAY_SERVER_URL', 'https://sandbox.aamarpay.com/request.php'),
    'store_id' => env('AAMARPAY_STORE_ID', 'aamarpaytest'),
    'signature_key' => env('AAMARPAY_SIGNATURE_KEY', 'dbb74894e82415a2f7ff0ec3a97e4183'),
    'success_url' => env('AAMARPAY_SUCCESS_URL', 'http://localhost:8000/api/verify'),
    'cancel_url' => env('AAMARPAY_CANCEL_URL', 'http://localhost:8000/api/verify'),
    'fail_url' => env('AAMARPAY_FAIL_URL', 'http://localhost:8000/api/verify'),
];
