<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class ManualController extends Controller
{
    public function make(Request $request, Customer $customer)
    {
        $customer->transactions()->createMany([$request->all()]);
        $total = $customer->transactions()->sum('amount');
        if($total > $customer->room->price)
        {
            return redirect()->back()->with('error','Exceed amount than real!');
        }
        $payment_status = ($total == $customer->room->price) ? 'complete' : $request['payment_type'];
        $customer->update(['payment_status'=> $payment_status]);
        return redirect()->back()->with('success','Successfully paid!');
    }
}
