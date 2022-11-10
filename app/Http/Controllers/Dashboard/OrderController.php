<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $orders = Order::latest()->whereNotIn('status', ['Processing'])->paginate();
        return view('dashboard.order.index', compact('orders'));
    }

    /**
     * @param Order $order
     * @return mixed
     */
    public function show(Order $order)
    {
        return view('dashboard.order.show', compact('order'));
    }


    /**
     * @param Request $request
     * @param Order $order
     * @return mixed
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status'        => 'required',
        ]);

        $order = $order->forceFill([
            'status'        => request('status'),
        ])->save();

        if ($order) {
            alert()->success('وضعیت محصول مشخص شد');
        }

        return redirect()->route('dashboard.orders.index');
    }

    /**
     * @param Order $order
     * @return mixed
     */
    public function destroy(Order $order)
    {
        try {
           $order->delete();
            alert()->info('با موفقیت حذف شد!');
        }catch (\Exception $e){}

        return redirect()->route('dashboard.orders.index');
    }
}
