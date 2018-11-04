<?php

namespace App\Http\Controllers\Watch;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Cookie;

class CartController extends Controller
{
    public function cookieCart()
    {
        $user_cart = 'shop_cart'.Auth::user()->id;
        if (Cookie::get($user_cart)){
            $cookie_data = Cookie::get($user_cart);
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }

        return $cart_data;
    }

    public function index(Request $request)
    {
        $products = $this->cookieCart();
        return view('watch.cart', compact('products'));
    }

    public function create(Request $request)
    {
        $user_cart = 'shop_cart'.Auth::user()->id;
        $product = Product::findorfail($request->id_product);
        $cart_data = $this->cookieCart();
        $item_id_list = array_column($cart_data, 'id_product');

        if(in_array($request->id_product, $item_id_list)) {
            foreach($cart_data as $keys => $values) {
                if($cart_data[$keys]["id_product"] == $request->id_product) {
                    $cart_data[$keys]["quantity"] = $cart_data[$keys]["quantity"] + config('custom.min');
                }
            }
        } else {
            $item_array = array(
                'id_product'   => $request->id_product,
                'name'   => $product->name,
                'price'  => $product->price,
                'quantity'  => config('custom.min'),
            );
            $cart_data[] = $item_array;
        }
        $item_data = json_encode($cart_data);
        $cookie = cookie($user_cart, $item_data, config('custom.timeout_cookie'));
        $respone = new Response;
        return $respone->withCookie($cookie);
    }

    public function update(Request $request, $id)
    {
        $user_cart = 'shop_cart'.Auth::user()->id;
        $cart_data = $this->cookieCart();
        $item_id_list = array_column($cart_data, 'id_product');

        if(in_array($id, $item_id_list)) {
            foreach($cart_data as $keys => $values) {
                if($cart_data[$keys]["id_product"] == $id) {
                    $cart_data[$keys]["quantity"] = $request->number;
                }
            }
        } else {
            return redirect()->route('cart.index');
        }
        $item_data = json_encode($cart_data);
        $cookie = cookie($user_cart, $item_data, config('custom.timeout_cookie'));

        return redirect()->route('cart.index')->withCookie($cookie);
    }

    public function destroy(Request $request, $id)
    {
        $user_cart = 'shop_cart'.Auth::user()->id;
        $cart_data = $this->cookieCart();
        $item_id_list = array_column($cart_data, 'id_product');

        if(in_array($id, $item_id_list)) {
            foreach($cart_data as $keys => $values) {
                if($cart_data[$keys]["id_product"] == $id) {
                    unset($cart_data[$keys]);
                }
            }
        } else {
            return redirect()->route('cart.index');
        }
        $item_data = json_encode($cart_data);
        $cookie = cookie($user_cart, $item_data, config('custom.timeout_cookie'));

        return redirect()->route('cart.index')->withCookie($cookie);
    }
}
