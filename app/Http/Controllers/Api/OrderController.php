<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with(['product', 'customer'])->paginate(25);
    }

    public function show(Order $order)
    {
        return $order->load(['product', 'customer']);
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['nullable', 'string'],
            'subtotal' => ['nullable', 'numeric'],
            'tax' => ['nullable', 'numeric'],
            'total' => ['nullable', 'numeric'],
            'tax_rate' => ['nullable', 'numeric'],
            'currency' => ['nullable', 'string', 'max:10'],
            'province' => ['nullable', 'string', 'max:50'],
            'paid_at' => ['nullable', 'date'],
            'refunded_at' => ['nullable', 'date'],
        ]);

        $order->update($data);

        return $order->refresh();
    }
}
