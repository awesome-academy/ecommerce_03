<?php

namespace App\Http\Controllers\Watch;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Cookie;

class ProductController extends Controller
{
    public function common($request, $products, $type)
    {
        if ($request){
            $products->where(function($products) use ($request, $type) {
                foreach ($request as $each_request) {
                    if ($each_request == config('custom.type_first')){
                        $products->orWhere($type, 'LIKE', config('custom.type_first'));
                    }

                    if ($each_request == config('custom.type_second')){
                        $products->orWhere($type, 'LIKE', config('custom.type_second'));
                    }
                }
            });
        }
        return true;
    }

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

    public function filter(Request $request)
    {
        $products = Product::select('*');
        if ($request->cat){
            $categories = $request->cat;
            $products = $products->where(function($products) use ($categories) {
                foreach ($categories as $category) {
                    $cat = Category::where('id', '=', $category)->first();
                    if ($category != config('custom.zero')) {
                        if (count($cat->children) > config('custom.zero')) {
                            foreach ($cat->children as $cat_child) {
                                $products->orwhere('category_id', '=', $cat_child->id);
                            }
                        } else {
                            $products->orwhere('category_id', '=', $category);
                        }
                    }
                }
            });
        }
        $this->common($request->strap, $products, 'strap_type');
        $this->common($request->skin, $products, 'skin_type');
        $this->common($request->energy, $products, 'energy');

        if ($request->price_min && $request->price_max){
            $price_min = $request->price_min * config('custom.million');
            $price_max = $request->price_max * config('custom.million');
            $products->whereBetween('price',  [$price_min, $price_max]);
        }
        $search = explode(' ',$request->search);
        $products->where(function($products) use ($search) {
            for($i = config('custom.zero'); $i < count($search); $i++)
            {
                $products->orWhere('name','LIKE','%'.$search[$i].'%');
            }
        });

        if ($request->sort == 'popularity'){
            $products = $products->orderBy('best_seller', 'DESC');
        } elseif ($request->sort == 'price_asc') {
            $products = $products->orderBy('price', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $products = $products->orderBy('price', 'desc');
        } else {
            $products = $products->orderBy('id', 'DESC');
        }
        $products = $products->paginate(config('custom.nine'));

        return view('watch.filter', compact('products'));
    }
}
