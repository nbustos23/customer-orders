<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller {
    public function index() {
        return view('customers.index');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
        ]);

        Customer::create($request->all());
        return response()->json(['success' => 'Customer added successfully!']);
    }

    public function getData() {
        $customers = Customer::latest()->get();
        return response()->json(['data' => $customers]);
    }
}
