@extends('products.layout')
@section('products')

<div class="card mt-5">
    <h2 class="card-header">Show product</h2>
    <div class="card-body">
        <div class="row">
            @foreach ($product as $prod)
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong> <br/>
                        {{ $prod->name }}
                    </div>
                </div>
                @foreach ($category as $name)
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Category:</strong> <br/>
                            {{ $name->name }}
                        </div>
                    </div>
                @endforeach
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price:</strong> <br/>
                        {{ $prod->price }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Description:</strong> <br/>
                        {{ $prod->description }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="d-grid gap-2 d-md-flex">
    <a class="btn btn-outline-dark btn-sm" href="{{ route('products.products') }}">Back</a>
</div>
@endsection
