<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
//        $orders = Order::where('user_id', session('user')['id']);
        $orders = Order::with('product')->where('user_id', session('user')['id'])->get();

        return view('order.index', compact('orders'));
    }
}
