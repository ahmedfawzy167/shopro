<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
   public function index()
   {
      $payments = Payment::all();
      return view('payments.index',compact('payments'));
   }

   public function accept($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'Accepted';
        $payment->save();
        Session::flash('message','Payment Accepted Successfully');
        return redirect()->route('payments.index');
    }

    public function reject($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'Rejected';
        $payment->save();
        Session::flash('message','Payment Rejected Successfully');
        return redirect()->route('payments.index');
    }

}
