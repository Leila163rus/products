@extends('orders.layout')
@section('orders')

<div class="card mt-5">
    <h2 class="card-header">Show order</h2>
    <div class="card-body">
        <div class="row">
            @foreach ($orders as $order)    
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Сreation date:</strong> <br/>
                        {{ $order->created_at }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product id:</strong> <br/>
                        {{ $order->products->id }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product:</strong> <br/>
                        {{ $order->products->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Quantity:</strong> <br/>
                        {{ $order->quantity }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category:</strong> <br/>
                        {{ $category['name'] }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price:</strong> <br/>
                        {{ $order->products->price }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                    <div class="form-group">
                        <strong>Description:</strong> <br/>
                        {{ $order->products->description }}
                    </div>
                </div>
                <form action="{{ route('orders.show', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <input
                            type="hidden"
                            name="product_id"
                            class="form-control form-control-sm"
                            value="{{ $order->product_id }}"
                            id="product_id"
                            placeholder="product_id"
                            readonly
                            required>
                    </div>        
                    <div class="mb-1">
                        <label for="customer" class="form-label"><strong>Customer:</strong></label>
                        <input
                            type="text"
                            name="customer"
                            class="form-control form-control-sm @error('customer') is-invalid @enderror"
                            value="{{ $order->customer }}"
                            id="customer"
                            placeholder="Customer"
                            readonly
                            required>
                                @error('customer')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="mb-1">
                        <label for="status" class="form-label"><strong>Status:</strong></label>
                        <select id="status" class="form-select form-select-sm" name="status">
                             @foreach($orders_status as $status)  
                                <option 
                                    class="@error('status') is-invalid @enderror"
                                    value="{{ $status }}"
                                    {{ $order->status == $status ? 'selected' : '' }}
                                    required>
                                    {{ $status }}
                                </option>
                            @endforeach    
                        </select>
                            @error('status')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mt-1">Update status</button>
                    <div class="mb-1">
                    <label for="comment" class="form-label"><strong>Comment:</strong></label>
                    <textarea
                        name="comment"
                        class="form-control form-control-sm @error('comment') is-invalid @enderror"
                        value="{{ $order->comment }}"
                        style="min-height:80px"
                        id="comment"
                        placeholder="Comment"
                        readonly
                        required>{{ $order->comment }}</textarea>
                            @error('comment')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </form>            
            @endforeach
        </div>
    </div>
</div>
<div class="d-grid gap-2 d-md-flex">
    <a class="btn btn-outline-dark btn-sm" href="{{ route('products.products') }}">Back</a>
</div>
@endsection