@extends('orders.layout')
@section('orders')

<div class="card mt-4">
    <h2 class="card-header">Add New Order</h2>
    <div class="card-body">
        <form action="{{ route('orders.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="product" class="form-label"><strong>Product:</strong></label>
                <select id="product" class="form-control" name="product_id">
                    @foreach ($products as $product)
                        <option 
                        class="form-control @error('product_id') is-invalid @enderror"
                        value= "{{ $product->id }}"
                        required>
                        {{ $product->name }}
                        </option>
                    @endforeach    
                </select>
                    @error('product_id')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label"><strong>Quantity:</strong></label>
                <input
                    type="number"
                    min="1"
                    max="100"
                    name="quantity"
                    class="form-control @error('quantity') is-invalid @enderror"
                    id="quantity"
                    placeholder="Quantity"
                    autocomplete="on"
                    required>
                        @error('quantity')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
            </div>
            <div class="mb-3">
                <label for="customer" class="form-label"><strong>Customer:</strong></label>
                <input
                    type="text"
                    name="customer"
                    class="form-control @error('customer') is-invalid @enderror"
                    id="customer"
                    placeholder="Customer"
                    autocomplete="on"
                    required>
                        @error('customer')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label"><strong>Comment:</strong></label>
                <textarea
                    name="comment"
                    class="form-control @error('comment') is-invalid @enderror"
                    style="min-height:80px"
                    id="comment"
                    placeholder="Comment"
                    autocomplete="on"
                    required></textarea>
                        @error('comment')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label"><strong>Status:</strong></label>
                <select id="status" class="form-select" name="status">
                    @foreach($orders_status as $status)  
                        <option 
                            class="@error('status') is-invalid @enderror"
                            value="{{ $status }}"
                            required>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
                    @error('status')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>
<div class="d-grid gap-2 d-md-flex">
    <a class="btn btn-outline-dark btn-sm" href="{{ route('orders.orders') }}">Back</a>
</div>
@endsection
