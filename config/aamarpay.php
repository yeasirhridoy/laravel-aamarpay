<?php

// config for Yahrdy/Aamarpay
return [
    'url' => env('AAMARPAY_SERVER_URL', 'https://sandbox.aamarpay.com/index.php'),
    'store_id' => env('AAMARPAY_USERNAME', 'aamarpay'),
    'signature_key' => env('AAMARPAY_PASSWORD', 'dc0c2802bf04d2ab3336ec21491146&6u6'),
    'success_url' => env('AAMARPAY_SUCCESS_URL', 'http://localhost:8000/api/verify'),
    'cancel_url' => env('AAMARPAY_CANCEL_URL', 'http://localhost:8000/api/verify'),
    'fail_url' => env('AAMARPAY_CANCEL_URL', 'http://localhost:8000/api/verify'),
];
