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
}
