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

        @foreach ($products as $product)
            <div class="row ">
                <div class="image col-md-4 ">
                    <img src="{{ asset('img/' . $product->image_path) }}" alt="Product Image" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h5 class="custom-h5-color">Prix:</h5>
                    <p>${{ $product->prix }}</p>
                    <h5 class="custom-h5-color">Quantité:</h5>
                    <p>
                        <button class="btn btn-sm btn-secondary" onclick="decrementQuantity({{ $product->id }})">-</button>
                        <span id="quantity_{{ $product->id }}" class="test">{{ $product->quantity }}</span>
                        <button class="btn btn-sm btn-secondary" onclick="incrementQuantity({{ $product->id }})">+</button>
                    </p>
                    <div class="d-flex gap-4">
                        <form action="{{ route('save.qte') }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="qte{{ $product->id }}" value="" name="qte">
                            <input type="hidden" value="{{ $product->product_id }}" name="idProduct">

                            <button type="submit" class="btn btn-sm btn-warning">save</button>

                        </form>
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <script>
        function incrementQuantity(productId) {
            let quantityElement = document.getElementById('quantity_' + productId);
            let qteInput = document.getElementById('qte' + productId);
            let currentQuantity = parseInt(quantityElement.textContent);
            quantityElement.textContent = currentQuantity + 1;
            qteInput.value = currentQuantity + 1;
        }

        function decrementQuantity(productId) {
            let quantityElement = document.getElementById('quantity_' + productId);
            let qteInput = document.getElementById('qte' + productId);
            let currentQuantity = parseInt(quantityElement.textContent);
            if (currentQuantity > 1) {
                quantityElement.textContent = currentQuantity - 1;
                qteInput.value = currentQuantity - 1;
            }
        }
    </script>
@endsection
