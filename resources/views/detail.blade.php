@extends('layout')

@section('details')
    <style>
        .custom-h5-color {
            color: #B88E2F;
        }

        .image {
            height: 400px;
            width: 300px;
            overflow: hidden;
        }

    </style>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $product->name }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="image col-md-4">
                            <img src="{{ asset('img/' . $product->image_path) }}" alt="Product Image" class="img-fluid" style="height: 100%; width: 100%;">
                        </div>
                        <div class="col-md-8">
                            <h5 class="custom-h5-color">Description:</h5>
                            <p>{{ $product->description }}</p>
                            <h5 class="custom-h5-color">Prix:</h5>
                            <p>${{ $product->prix }}</p>
                            <h6 class="custom-h5-color">Categorie:</h6>
                            <p>{{ $product->category->name }}</p>
                            <h5 class="custom-h5-color">Tags:</h5>
                            <p>{{ $product->tags }}</p>
                            <a href="/allproducts" class="btn btn-success mt-5">Go Back</a>
                            <button class="btn btn-outline-secondary float-right mt-5">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
