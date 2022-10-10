<?php

namespace Yahrdy\Aamarpay\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Yahrdy\Aamarpay\Aamarpay
 */
class Aamarpay extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Yahrdy\Aamarpay\Aamarpay::class;
    }
}
