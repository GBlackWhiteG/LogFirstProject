<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

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
            'amount' => 'integer|required|min:1',
        ]);

        $buy_amount = $data["amount"];
        $total_cost = $buy_amount * $product['cost'];

        if ($data['amount'] >= $product['amount']) {
            throw ValidationException::withMessages(['Incorrect amount']);
        }

        $data['amount'] = $product['amount'] - $data['amount'];
        $product->update($data);

        $order_data =
            ['product_id' => $product['id'],
                'amount' => (int)$buy_amount,
                'total' => $total_cost,
                'user_id' => session('user')['id']];
        Order::create($order_data);

        return redirect()->route('order.index', ['product' => $product]);
    }
}
