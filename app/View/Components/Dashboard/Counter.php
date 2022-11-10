<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class Counter extends Component
{
    public $users;
    public $orders;
    public $products;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->users    = User::count();
        $this->orders   = Order::count();
        $this->products = Product::count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.counter');
    }
}
