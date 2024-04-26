@extends('layout')
@section('content')
    <style>
        .card {
            position: relative;
            width: 100%;
            height: 100%;
            background: #000;
            overflow: hidden;
        }

        .card .image {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .card .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .5s;
        }

        .card:hover .image img {
            opacity: .5;
            transform: translateX(30%);
        }

        .card .details {
            position: absolute;
            top: 0;
            left: 0;
            width: 70%;
            height: 100%;
            background: #613400;
            transition: .5s;
            transform-origin: left;
            transform: perspective(2000px) rotateY(-90deg);
        }

        .card:hover .details {
            transform: perspective(2000px) rotateY(0deg);
        }

        .card .details .center {
            padding: 20px;
            text-align: center;
            background: #fff;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .card .details .center h1 {
            margin: 0;
            padding: 0;
            color: #a15804;
            line-height: 20px;
            font-size: 20px;
            text-transform: uppercase;
        }

        .card .details .center h1 span {
            font-size: 14px;
            color: #262626;
        }

        .card .details .center p {
            margin: 10px 0;
            padding: 0;
            color: #262626;
        }

        .card .details .center ul {
            margin: 10px auto 0;
            padding: 0;
            display: table;
        }

        .card .details .center ul li {
            list-style: none;
            margin: 0 5px;
            float: left;
        }

        .card .details .center ul li a {
            display: block;
            background: #262626;
            color: #fff;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            transform: .5s;
        }

        .card .details .center ul li a:hover {
            background: #ff3636;
        }
    </style>
    <div id="carouselExampleAutoplaying" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./../img/image3.jpg" class="d-block w-100 " style="height:50rem" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./../img/image2.jpg" class="d-block w-100 " style="height:50rem" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./../img/image1.jpg" class="d-block w-100 " style="height:50rem" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-5">Welcome to Our Furniture Store</h2>
        </div>
    </div>

{{--
    <div class="container d-flex flex-row grid gap-3 mb-5 w-100">
        @foreach ($categories as $category)
            <div>
                <a href="#">
                    <img src="{{ asset('img/' . $category->image_path) }}" class="d-block w-100 rounded-2 mb-3"
                        style="height:30rem" alt="...">
                    <p class="text-center fw-bold">{{ $category->name }}</p>
                </a>
            </div>
        @endforeach
    </div> --}}

    <div class="container">
        <div class="col-md-12 mb-5">
            <h2 class="text-center mb-5">Our Products</h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card" style="height:20rem">
                        <div class="image">
                            <img src="{{ asset('img/' . $product->image_path) }}" class="d-block w-100 rounded-2"
                                alt="{{ $product->name }}">
                        </div>
                        <div class="details">
                            <div class="center">
                                <h1>{{ $product->name }}</h1><br>
                                <h6>Categorie:</h6>
                                <p><span>{{ $product->category->name }}</span></p><br>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">© 2024 Company, Inc</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-linkedin"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-facebook"></i></a></li>
        </ul>
    </footer>
@endsection
