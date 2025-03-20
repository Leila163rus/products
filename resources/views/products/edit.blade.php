@extends('products.layout')
@section('products')

<div class="card mt-5">
    <h2 class="card-header">Edit Product</h2>
    <div class="card-body">
        @foreach ($product as $prod)
            <form action="{{ route('products.update', $prod->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Name:</strong></label>
                        <input
                            type="text"
                            name="name"
                            value="{{ $prod->name }}"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="Name"
                            autocomplete="on">
                        @error('name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="category" class="form-label"><strong>Category:</strong></label>
                        <select id="category" class="form-select" name="category_id">
                            @foreach ($category as $item)
                                @foreach($category_id as $id)
                                <option 
                                class="@error('category_id') is-invalid @enderror"
                                value="{{ $item->id }}" 
                                {{ $id->id == $item->id ? 'selected' : '' }}
                                required>
                                {{ $item->name }}
                                </option>
                                @endforeach
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label"><strong>Price:</strong></label>
                        <textarea
                            class="form-control @error('price') is-invalid @enderror"
                            name="price"
                            id="price"
                            placeholder="Price">{{ $prod->price }}</textarea>
                        @error('price')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Description:</strong></label>
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            style="min-height:150px"
                            name="description"
                            id="description"
                            placeholder="Description">{{ $prod->description }}</textarea>
                        @error('description')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>  
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        @endforeach  
      </div>
</div>
<div class="d-grid gap-2 d-md-flex">
    <a class="btn btn-outline-dark btn-sm" href="{{ route('products.products') }}">Back</a>
</div>
@endsection
