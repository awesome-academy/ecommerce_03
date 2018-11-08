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
        return view('watch.index', compact('products'));
    }

    public function detail(Request $request, $name, $id)
    {
        $product = Product::findorfail($id);
        return view('watch.product_detail', compact('product'));
    }
}
