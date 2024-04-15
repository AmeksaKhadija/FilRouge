@extends('layout')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header {
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .container-fluid {
            display: flex;
            height: 95vh;
        }

        .aside {
            width: 200px;
            background-color: #dc3545;
            /* Red color associated with blood */
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




    </style>
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <div class="container-fluid">
            <aside id="jenb" class="col-md-2 text-light p-4 aside">
                <ul class="list-unstyled">
                    <li>
                        <h5><a href="allproducts">Home Page</a></h5>
                    </li>
                    <li><a href="products">Produits</a></li>
                    <li><a href="categories">Categories</a></li>
                    <li><a href="users">USERS</a></li>
                    <li><a href="">STATISTIQUES</a></li>
                </ul>
            </aside>
{{-- contenu --}}
            <div class="col-md-10">
                <h1 id="st">STATISTICS</h1>





                        <!-- Canvas pour le graphique -->
                        {{-- <canvas id="myChart" width="400" height="400"></canvas> --}}

                        <!-- Script pour initialiser le graphique -->
                        {{-- <script>
                // Données du graphique
                var data = {
                    labels: ["Users", "Cities"],
                    datasets: [{
                        label: 'Statistics',
                        data: [/* Insérez ici les données */],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                };

                // Options du graphique
                var options = {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                };

                // Créer le graphique
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: options
                });
                </script> --}}
            </div>
        </div>
    @endsection
