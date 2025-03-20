@extends('orders.layout')
@section('orders')

<table class="table mx-auto table-bordered mt-4 caption-top">
    <caption>Orders</caption>
    <thead class="table-light">
        <tr>
            <th style="width:5%">Id</th>
            <th style="width:13%">Сreation date</th>
            <th>Product</th>
            <th>Customer</th>
            <th>Status</th>
            <th style="width:45%">Comment</th>
            <th>Cost</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)             
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->products->name }}</td>
                <td>{{ $order->customer }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->comment }}</td>
                <td>{{ Number::format($order->products->price * $order->quantity, 2) }}</td>
                <td>                  
                    <a class="btn btn-outline-dark btn-sm me-2" href="{{ route('orders.show', $order->id) }}">Show</a>  
                </td>
            </tr>      
        @endforeach
    </tbody>
    <tfoot>
        <tr>
          <th colspan="6">Total cost:</th>
          <td>{{ $total_cost }}</td>
        </tr>
   </tfoot>
</table>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-success btn-sm" href="{{ route('orders.create') }}">Create order</a>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
    <a class="btn btn-success btn-sm" href="{{ route('products.products') }}">Products</a>
</div>
@if (session('success'))
    <div class="alert alert-success mt-4">
        {{ session('success') }}
    </div>
@endif
@endsection
