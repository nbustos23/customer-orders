@extends('layouts.app')

@section('content')
    <h2>Customers</h2>

    <form id="customerForm" class="mb-4">
        @csrf
        <input type="text" name="name" placeholder="Name" required class="form-control mb-2">
        <input type="email" name="email" placeholder="Email" required class="form-control mb-2">
        <input type="text" name="phone" placeholder="Phone" class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Add Customer</button>
    </form>

    <table class="table table-bordered" id="customersTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function() {
            var table = $('#customersTable').DataTable({
                ajax: '/customers/data',
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'phone'}
                ]
            });

            $('#customerForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/customers',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response){
                        alert(response.success);
                        $('#customerForm')[0].reset();
                        table.ajax.reload();
                    },
                    error: function(xhr){
                        alert(xhr.responseJSON.errors.name || xhr.responseJSON.errors.email);
                    }
                });
            });
        });
    </script>
@endsection
