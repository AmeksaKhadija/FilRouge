@extends('layout')

@section('panier')
    <style>
        .image {
            height: 400px;
            width: 300px;
            overflow: hidden;
        }

        .total-card {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #F9F1E7;
            padding: 20px;
            border-top: 1px solid #fff;
            box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.1);
        }

        .total-card h4 {
            margin-bottom: 10px;
            color: #333;
        }

        .total-card p {
            margin: 0;
            font-size: 18px;
            color: #666;
        }

        .buy {
            background-color: #B88E2F;
            /* Couleur de fond */
            color: #fff;
            /* Couleur du texte */
            border: none;
            /* Supprimer la bordure */
            border-radius: 4px;
            /* Coins arrondis */
            padding: 10px 20px;
            /* Espacement intérieur */
            font-size: 16px;
            /* Taille de la police */
            cursor: pointer;
            /* Curseur de souris */
            transition: background-color 0.3s ease;
            /* Animation de transition */
        }

        .buy:hover {
            background-color: #7a5f1f;
            /* Couleur de fond au survol */
        }
    </style>
    <div class="container mt-5">
        @foreach ($items as $product)
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
                        <form action="/retirerProduct/{{ $product->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                </div>
            </div>


            <div class="total-card">
                <h4 id="totalPrice">Total: ${{ $totalGlobal }}</h4>
                <form action="{{ route('mollie') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                    <input type="hidden" name="quantity" value="{{ $product->quantity }}">
                    <input type="hidden" name="amount" value="{{$totalGlobal}}.00">
                    <button class="buy" type="submit">Buy Now</button>
                </form>
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
