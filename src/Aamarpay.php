<?php

namespace Yahrdy\Aamarpay;

use Illuminate\Support\Facades\Http;

class Aamarpay
{
    private $url;

    private $cancelUrl;

    private $failUrl;

    private $storeId;

    private $signatureKey;

    public function __construct()
    {
        $this->url = config('aamarpay.url');
        $this->cancelUrl = config('aamarpay.cancel_url');
        $this->failUrl = config('aamarpay.fail_url');
        $this->storeId = config('aamarpay.store_id');
        $this->signatureKey = config('aamarpay.signature_key');
    }

    public function checkout($amount, $orderId, $name, $address, $phone, $postCode = 1200, $value1 = null, $value2 = null, $value3 = null, $value4 = null)
    {

        $data = [
            'store_id' => $this->storeId,
            'signature_key' => $this->signatureKey,
            'tran_id' => $orderId,
            'success_url' => $this->url,
            'fail_url' => $this->failUrl,
            'cancel_url' => $this->cancelUrl,
            'amount' => $amount,
            'currency' => 'BDT',
            'desc' => 'Course payment',
            'cus_name' => $name,
            'cus_email' => 'someone@example.com',
            'cus_add1' => $address,
            'cus_add2' => 'Dhaka',
            'cus_city' => 'Dhaka',
            'cus_state' => 'Dhaka',
            'cus_country' => 'Bangladesh',
            'cus_phone' => $phone,
        ];

        return Http::post($this->url, $data)->json();
    }

}
