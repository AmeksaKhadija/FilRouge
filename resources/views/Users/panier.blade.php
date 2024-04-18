@extends('layout')

@section('panier')
    <style>
        .image {
            height: 400px;
            width: 300px;
            overflow: hidden;
        }
    </style>
    <div class="container mt-5">
        {{-- @dd($products) --}}
            @foreach ($products as $product)
                <div class="row">
                    <div class="image col-md-4 mt-4">
                        <img src="{{ asset('img/' . $product->image_path) }}" alt="Product Image" class="img-fluid">
                    </div>
                    {{-- @dd($product) --}}
                    <div class="col-md-8">
                        <h5 class="custom-h5-color">Prix:</h5>
                        <p>${{ $product->prix }}</p>
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
    </div>
@endsection
