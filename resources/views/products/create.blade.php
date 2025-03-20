@extends('products.layout')
@section('products')

<div class="card mt-5">
    <h2 class="card-header">Add New Product</h2>
    <div class="card-body">
        <form action="{{ route('products.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Name:</strong></label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    placeholder="Name"
                    autocomplete="on"
                    required>
                        @error('name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label"><strong>Category:</strong></label>
                <select id="category" class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option 
                        class="@error('category_id') is-invalid @enderror"
                        value="{{ $category->id }}"
                        required>
                        {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                    @error('category_id')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label"><strong>Price:</strong></label>
                <input
                    type="number"
                    step="any"
                    name="price"
                    class="form-control @error('price') is-invalid @enderror"
                    id="price"
                    placeholder="Price"
                    autocomplete="on"
                    required>
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
                    placeholder="Description"
                    required></textarea>
                    @error('description')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>
<div class="d-grid gap-2 d-md-flex">
    <a class="btn btn-outline-dark btn-sm" href="{{ route('products.products') }}">Back</a>
</div>
@endsection