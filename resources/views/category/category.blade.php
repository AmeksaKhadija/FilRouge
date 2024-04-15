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
        .brown-color {
    color: brown;
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
                <h1 id="st">Categories</h1>
                <br>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <section class="Agents px-4 ">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="#addEmployeeModal" class="btn btn-secondary" data-toggle="modal"><i
                                class="material-icons">&#xE147;</i> <span>Add category</span></a>
                    </div>

                    <table class="agent table align-middle bg-white">

                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="freelancer">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1 f_title">
                                                    {{ $category->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="display: flex; gap:10px">
                                        <form action="/deletecategory/{{ $category->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>

                                        <a href="/editcategory/{{ $category->id }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <ul class="pagination">
                            {!! $categories->links() !!}
                        </ul>
                    </div>
                @section('additional_content')
                    <div id="addEmployeeModal" class="modal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form id="employeeForm" method="post" action="/addcategory">
                                    @csrf
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Category</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>

                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal"
                                                value="Cancel">
                                            <input type="submit" class="btn btn-success" value="Add">
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                @endsection

        </div>
    </div>
@endsection
