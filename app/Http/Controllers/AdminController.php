<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('products', 'user')->get();

        return view('admin.index', compact('orders'));
    }
}
