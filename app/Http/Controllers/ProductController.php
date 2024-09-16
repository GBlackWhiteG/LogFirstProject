<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function show(Product $product): View
    {
        return view('product.show', compact('product'));
    }

    public function buy(Product $product): RedirectResponse
    {
        $data = request()->validate([
            'amount' => 'integer|required',
        ]);

        $buy_amount = $data["amount"];
        $total_cost = $buy_amount * $product['cost'];

        if ($data['amount'] <= $product['amount'] && $data['amount'] > 0) {
            $data['amount'] = $product['amount'] - $data['amount'];
            $product->update($data);

            $order_data = ['name' => $product['name'], 'amount' => $buy_amount, 'total' => $total_cost];
            Order::create($order_data);
        }
        return redirect()->route('order.index', ['product' => $product]);
    }
}
