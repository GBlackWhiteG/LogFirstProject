<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('products')->where('user_id', Auth::id())->get();

        return view('order.index', compact('orders'));
    }

    public function status(Order $order): RedirectResponse
    {
        $statuses = ['new', 'accepted', 'delivered'];

        $status = $order['status'];
        $status_code = array_search($status, $statuses);
        $status_method = (int)request()['status_method'];

        $status_method = $status_method >= 0 ? 1 : -1;

        if (isset($statuses[$status_code + $status_method])) {
            $status = $statuses[$status_code + $status_method];
        }

        $order->update(['status' => $status]);

        return redirect()->route('admin.index');
    }
}
