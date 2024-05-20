<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\PaymentDetailsResource;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'user_id' => 'required|numeric|gt:0',
            'amount' => 'required|numeric|gt:0',
            'date' => 'required|date',
            'method' => 'required|string|max:100',
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()],400);
        }

        $payment = new Payment();
        $payment->user_id = $request->user_id;
        $payment->amount = $request->amount;
        $payment->date = $request->date;
        $payment->method = $request->method;
        $payment->save();

        return response()->json([
            'status' => 200 ,
            'message'  => 'Payment Made Successfully',
            'payment' => $payment,
        ]);
    }

    public function show($id){
        $payment = payment::find($id);
        if($payment != null){
           return new PaymentDetailsResource($payment);
        }
        else{
            return response()->json(['message' => 'Payment Unavailable'],404);
        }
    }


}
