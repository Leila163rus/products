@extends('products.layout')
@section('products')

<table class="table mx-auto table-bordered mt-4 caption-top">
    <caption>Products</caption>
    <thead class="table-light">
        <tr>
            <th style="width:5%">Id</th>
            <th>Name</th>
            <th style="width:10%">Price</th>
            <th style="width:20%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <form action="{{ route('products.delete', $product->id) }}" method="POST">                       
                        <a class="btn btn-outline-dark btn-sm me-2" href="{{ route('products.show', $product->id) }}">Show</a>
                        <a class="btn btn-outline-dark btn-sm me-2" href="{{ route('products.edit', $product->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-success btn-sm" href="{{ route('products.form') }}">Create product</a>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
    <a class="btn btn-success btn-sm" href="{{ route('orders.orders') }}">Orders</a>
</div>
@if (session('success'))
    <div class="alert alert-success mt-4">
        {{ session('success') }}
    </div>
@endif
@endsection