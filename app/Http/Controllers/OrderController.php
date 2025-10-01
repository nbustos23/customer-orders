<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;

class OrderController extends Controller {
    public function index() {
        $customers = Customer::all();
        return view('orders.index', compact('customers'));
    }

    public function store(Request $request) {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Order::create($request->all());
        return response()->json(['success' => 'Order added successfully!']);
    }
}
