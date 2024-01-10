<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Http\Requests\Order\OrderRequest;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token,
        ];
        return response()->json($data, 200);
    }


    public function makePayment(OrderRequest $request, Gateway $gateway){
        $result= $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce'=>$request->token,
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);
        if($result->success){
            $data =[
                'success'=> true ,
                'message' => 'payment done',
            ];
            return response()->json($data, 200);
        }
        else{
            $data =[
                'success'=> false ,
                'message' => 'payment fail',
            ];
            return response()->json($data, 400);
        }
        return 'make payment';
    }
}
