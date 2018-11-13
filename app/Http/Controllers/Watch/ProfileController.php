<?php

namespace App\Http\Controllers\Watch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findorfail(Auth::user()->id);

        return view('watch.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
        $customer = Customer::where('user_id', '=', $id)->first();
        $data_user = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if ($request->password != null) {
            $data_user['password'] = bcrypt($request->password);
        }
        $user->update($data_user);
        $user->save();

        try {
            if ($customer != null){
                $customer->phone = $request->phone;
                $customer->address = $request->address;
                $path = 'images/users/'.$user->customers->avatar;

                if ($request->avatar != null){
                    if ($user->customers->avatar != null) {
                        Storage::delete($path);
                    }
                    $image = $request->file('avatar')->store('images/users');
                    $tmp = explode('/', $image);
                    $avatar = end($tmp);
                    $customer->avatar = $avatar;
                }
                $customer->save();
            }
            $request->session()->flash('suc', trans('message.update_success'));
        } catch (Exception $e) {
            $request->session()->flash('err', $e->getMessage());
        }

        return redirect()->route('profile.index');
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
