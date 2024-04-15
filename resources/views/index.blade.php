@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">Welcome to Our Furniture Store</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Price: ${{ $product->prix }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View Details</a>
                            <button class="btn btn-outline-secondary float-right">Add to Cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
