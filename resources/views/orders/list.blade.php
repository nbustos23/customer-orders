@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Orders</h1>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price ($)</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name ?? 'Unknown' }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ number_format($order->price, 2) }}</td>
                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
