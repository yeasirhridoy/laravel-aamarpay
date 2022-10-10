<?php

use Illuminate\Support\Facades\Route;
use Yahrdy\Shurjopay\Http\Controllers\ShurjoPayController;

Route::prefix('api/aamarpay')->group(function () {
    Route::get('verify', function (){
        return (new \Yahrdy\Aamarpay\Aamarpay())->checkout(200,1, 'Yahrdy', 'Dhaka', '01700000000');
    })->name('shurjopay.verify');
});
