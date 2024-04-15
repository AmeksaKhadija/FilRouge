@extends('layout')

@section('details')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $product->name }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="Product Image" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h5>Description:</h5>
                            <p>{{ $product->description }}</p>
                            <h5>Prix:</h5>
                            <p>{{ $product->prix }}</p>
                            <h5>Categorie:</h5>
                            <p>{{ $product->categories_name }}</p>
                            <h5>Tags:</h5>
                            <p>{{ $product->tags }}</p>
                            <a href="/allproducts" class="btn btn-success">Go Back</a>
                            <button class="btn btn-outline-secondary float-right">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
