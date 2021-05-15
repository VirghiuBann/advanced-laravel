<?php

namespace App\Billing;

use Illuminate\Support\Str;

class PaymentGateway
{

    public function charge($amount)
    {
        # code...

        return [
            'amount' => $amount,
            'confirmation_number' => Str::random(8)
        ];
    }
}
