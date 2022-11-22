<?php

namespace Yahrdy\Aamarpay;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Aamarpay
{
    private mixed $url;

    private mixed $successUrl;

    private mixed $cancelUrl;

    private mixed $failUrl;

    private mixed $storeId;

    private mixed $signatureKey;

    public function __construct()
    {
        $this->url = config('aamarpay.url');
        $this->successUrl = config('aamarpay.success_url');
        $this->cancelUrl = config('aamarpay.cancel_url');
        $this->failUrl = config('aamarpay.fail_url');
        $this->storeId = config('aamarpay.store_id');
        $this->signatureKey = config('aamarpay.signature_key');
    }

    public function checkout($amount, $name, $address, $phone, $value1 = null, $value2 = null, $value3 = null, $value4 = null)
    {
        $data = [
            'store_id' => $this->storeId,
            'signature_key' => $this->signatureKey,
            'tran_id' => uniqid(),
            'success_url' => $this->successUrl,
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
            'opt_a' => $value1,
            'opt_b' => $value2,
            'opt_c' => $value3,
            'opt_d' => $value4,
        ];
        $fields_string = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));
        curl_close($ch);
        $baseUrl = parse_url($this->url)['host'];

        return 'https://'.$baseUrl.$url_forward;
    }

    public function verify(Request $request)
    {
        $url = config('aamarpay.verify_url');
        $url = $url.'?'.http_build_query([
            'request_id' => $request->mer_txnid,
            'store_id' => $this->storeId,
            'signature_key' => $this->signatureKey,
            'type' => 'json',
        ]);
        $response = Http::get($url)->json();

        return $response['pay_status'] ?? null == 'Successful';
    }
}
