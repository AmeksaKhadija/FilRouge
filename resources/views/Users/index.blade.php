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
                <h1 id="st">users</h1>
                <br>
                <section class="Agents px-4 ">

                    <table class="agent table align-middle bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>email</th>
                                <th>Rendre admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="freelancer">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1 f_title">
                                                    {{ $user->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1 f_title">
                                                    {{ $user->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('users.make-admin', $user->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('make-admin-form-{{ $user->id }}').submit();">
                                            <i class="fa fa-user-shield text-success"></i>
                                            <!-- Assurez-vous de remplacer la classe d'icône par celle appropriée de FontAwesome -->
                                        </a>
                                        <form id="make-admin-form-{{ $user->id }}"
                                            action="{{ route('users.make-admin', $user->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('POST')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <ul class="pagination">
                            {!! $users->links() !!}
                        </ul>
                    </div>
            </div>
        </div>
    @endsection
