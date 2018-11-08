<?php

namespace App\Http\Controllers\Watch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $customer = User::findorfail(Auth::user()->id);

        return view('watch.profile', compact('customer'));
    }

    public function yourOrder()
    {
        $customer = User::findorfail(Auth::user()->id);
        if (!$customer->customers){
            return redirect()->route('index');
        }

        $orders = $customer->customers->orders;

        return view('watch.order', compact('orders'));
    }
}
