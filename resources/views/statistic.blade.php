@extends('layout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Votre Titre</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f9fa;
                margin: 0;
                padding: 0;
            }

            header {
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
                background-color: #ffffff;
                /* Ajoutez ici d'autres styles pour l'en-tête si nécessaire */
            }

            .container-fluid {
                display: flex;
                height: 95vh;
            }

            .aside {
                width: 200px;
                background-color: #dc3545;
                color: white;
                padding: 20px;
            }

            .content {
                flex: 1;
                padding: 20px;
            }

            aside li a {
                text-decoration: none;
                color: white;
            }

            aside li {
                padding: 10px;
                margin-bottom: 10px;
                border-radius: 5px;
                transition: .3s;
            }

            aside li:hover {
                background-color: #dd7805;
            }

            aside li:hover a {
                color: #ffffff;
            }

            #jenb {
                background-color: #8f4d02;
            }

            /* Ajoutez ici d'autres styles spécifiques à votre contenu si nécessaire */

            .statistics-container {
                display: flex;
                justify-content: space-around;
                margin-top: 20px;
            }

            .statistic {
                text-align: center;
                padding: 20px;
                background-color: #f2f2f2;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .statistic h3 {
                margin-bottom: 10px;
            }

            .statistic-value {
                font-size: 50px;
                font-weight: bold;
                color: #333;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <aside id="jenb" class="col-md-2 text-light p-4 aside">
                <ul class="list-unstyled">
                    <li>
                        <h5><a href="allproducts">Home Page</a></h5>
                    </li>
                    <li><a href="products">Produits</a></li>
                    <li><a href="categories">Categories</a></li>
                    <li><a href="users">USERS</a></li>
                    <li><a href="statistic">STATISTIQUES</a></li>
                </ul>
            </aside>
            <div class="col-md-10">
                <div class="content p-4">
                    <div class="statistics-container">
                        <div class="statistic">
                            <h3>Total des Produits</h3>
                            <div class="statistic-value">{{ $totalProducts }}</div>
                        </div>
                        <div class="statistic">
                            <h3>Total des Catégories</h3>
                            <div class="statistic-value">{{ $totalCategories }}</div>
                        </div>
                        <div class="statistic">
                            <h3>Total des Utilisateurs</h3>
                            <div class="statistic-value">{{ $totalUsers }}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
