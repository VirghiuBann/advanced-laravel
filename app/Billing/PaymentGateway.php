<?php

namespace App\Billing;

use Illuminate\Support\Str;

class PaymentGateway
{
    private $currency;

    public function __construct($currency)
    {
        $this->currency = $currency;
    }

    public function charge($amount)
    {
        # code...

        return [
            'amount' => $amount,
            'confirmation_number' => Str::random(8),
            'currency' => $this->currency
        ];
    }
}
