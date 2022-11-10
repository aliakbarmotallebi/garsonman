<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Table;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        if ( $request->has('q') ){
            $products =  $products->search($request->get('q'));
        }

        $orderByClause  = "CASE WHEN status = 'PUBLISH' THEN 0 ELSE 1 END,";
        $orderByClause .= "CASE WHEN status = 'UN_PUBLISH' THEN 0 ELSE 1 END";

        $products   =  $products
        ->orderByRaw($orderByClause)
        ->get();
        $categories = Category::all();
        return view('main.index', ['products' => $products ,'categories' => $categories]);
    }

    public function product(Product $product)
    {
        $product->increment('visit_count', 1);
        return view('main.product.show', ['product' => $product]);
    }

	public function main()
    {
        return view('main._index');
    }

    public function cart()
    {
        return view('main.cart');
    }
}
