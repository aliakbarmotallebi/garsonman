<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
//use App\Models\Order;
Use App\Models\Table;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $tables  = Table::latest()->get();
        $orders = Order::latest()->whereNotIn('status', ['Processing'])->take(10)->get();
        $products    = Product::latest()->take(5)->get();
        return view('dashboard.index', compact('tables', 'products', 'orders'));
    }
}
