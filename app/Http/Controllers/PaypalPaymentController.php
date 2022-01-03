<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaypalPaymentController extends Controller
{
    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $this->paypalClient->setApiCredentials(config('paypal'));
        $token = $this->paypalClient->getAccessToken();
        $this->paypalClient->setAccessToken($token);
        $order = $this->paypalClient->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                 [
                    "amount"=> [
                        "currency_code"=> "USD",
                        "value"=> $data['amount']
                    ],
                     'description' => 'test'
                ]
            ],
        ]);

        return response()->json($order);


        //return redirect($order['links'][1]['href'])->send();
       // echo('Create working');
    }
}
