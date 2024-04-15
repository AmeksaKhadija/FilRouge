<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YouChoix</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">


    <style>
        .input-group-append {
            cursor: pointer;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .wrapper {
            flex: 1;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            margin-top: auto;
            width: 100%;
        }

        a {
            text-decoration: none;
            font-size: 1.2em;
            color: #31040d;
        }
    </style>
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-white bg-white shadow sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: #0c0c0c;"><span style="color: #2e42f1;"
                    class="nav-brand-two">You</span>Choix</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Rechercher..." aria-label="Search">
                <button class="btn btn-outline-danger" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="allproducts">List des produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register">Register</a>
                </li>
            </ul>
        </div>
    </header>

    <div class="main">
        @yield('content')
        @yield('additional_content')
        <div class="container">
            @yield('editcategory')
        </div>
        @yield('products')
        @yield('details')
        @yield('addproduct')
        <div class="container">
            @yield('editproduit')
        </div>
        @yield('clients')
        @yield('addclients')
        <div class="container">
            @yield('editclient')
        </div>
    </div>
{{--
    <footer class="footer" style="background-color: #b7c3ce; padding: 50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h4>À propos de YouSave</h4>
                    <p>Transformez votre intérieur en un havre de confort et de style avec notre sélection exclusive de
                        meubles de qualité. Chez YouChoix, nous vous offrons des pièces uniques et élégantes pour créer
                        l'espace de vos rêves. Découvrez notre collection dès maintenant et donnez vie à votre vision de
                        la perfection.</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4>Contactez-nous</h4>
                    <ul class="list-unstyled">
                        <li>Adresse: Youssofia, Maroc</li>
                        <li>Téléphone: +123456789</li>
                        <li>Email: contact@youchoix.com</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h4>Suivez-nous</h4>
                    <ul class="list-unstyled">
                        <li><a href="www.facebook.com/AmeksaKhadija"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="www.instagram.com/AmeksaKhadija"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="twitter.com/AmeksaKhadija"><i class="fab fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</body>

</html>
