@extends('layouts.app')

@section('content')
    <h2>Create Order</h2>

    <form id="orderForm" class="mb-4">
        @csrf
        <select name="customer_id" class="form-select mb-2" required>
            <option value="">Select Customer</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
        <input type="text" name="product_name" placeholder="Product Name" required class="form-control mb-2">
        <input type="number" name="quantity" placeholder="Quantity" required class="form-control mb-2">
        <input type="number" step="0.01" name="price" placeholder="Price" required class="form-control mb-2">
        <button type="submit" class="btn btn-success">Add Order</button>
    </form>

    <script>
        $('#orderForm').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '/orders',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response){
                    alert(response.success);
                    $('#orderForm')[0].reset();
                },
                error: function(xhr){
                    alert('Error adding order');
                }
            });
        });
    </script>
@endsection
