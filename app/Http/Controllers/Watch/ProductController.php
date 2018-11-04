<?php

namespace App\Http\Controllers\Watch;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Cookie;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(config('custom.paginate'));
        return view('watch.product', compact('products'));
    }

    public function addcart(Request $request)
    {
        $user_cart = 'shop_cart'.Auth::user()->id;
        $product = Product::findorfail($request->id_product);
        if (Cookie::get($user_cart)){
            $cookie_data = Cookie::get($user_cart);
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }
        $item_id_list = array_column($cart_data, 'id_product');

        if(in_array($request->id_product, $item_id_list)) {
            foreach($cart_data as $keys => $values) {
                if($cart_data[$keys]["id_product"] == $request->id_product) {
                    $cart_data[$keys]["quantity"] = $cart_data[$keys]["quantity"] + 1;
                }
            }
        } else {
            $item_array = array(
                'id_product'   => $request->id_product,
                'name'   => $product->name,
                'price'  => $product->price,
                'quantity'  => 1
            );
            $cart_data[] = $item_array;
        }
        $item_data = json_encode($cart_data);
        $cookie = cookie($user_cart, $item_data, 86000);
        $respone = new Response;
        return $respone->withCookie($cookie);
    }
}
