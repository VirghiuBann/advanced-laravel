<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway)
    {
        // PaymentGateway $paymentGateway
        // $paymentGateway = new PaymentGateway('usd');
        $order = $orderDetails->all();

        dd($paymentGateway->charge(2500));
    }
}
