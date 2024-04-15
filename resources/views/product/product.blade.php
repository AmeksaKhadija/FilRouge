
@extends('layout')
@section('products')
<br>



  @if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
   {{$message}}
  </div>
  @endif
<section class="Agents px-4 ">
    <div class="d-flex justify-content-end mb-3">
        <a href="#addEmployeeModal" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="material-icons">&#xE147;</i> Add product</a>
    </div>

    <table class="agent table align-middle bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>price</th>
                <th>category</th>
                <th>tags</th>
                <th>image_path</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $product)
            <tr class="freelancer">
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $product->name }}
                            </p>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                            <p>{{ $product->prix }}</p>
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $product->categories_name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $product->tags }}
                            </p>
                        </div>
                    </div>
                </td>
                {{-- <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $product->quantity}}
                            </p>
                        </div>
                    </div>
                </td> --}}
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;">
                        </div>
                    </div>
                </td>

                <td>
                    <a href="/deleteproduct/{{ $product->id }}"><img class="delet_user"><i class="fa-solid fa-trash"></i></a>
                    <a href="/editproduct/{{ $product->id }}"><img class="ms-2 edit"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
       <div class="d-flex justify-content-end">
            <ul class="pagination">
                {{-- {!! $produits->links() !!} --}}
            </ul>
        </div>
</section>
@endsection

@section('addproduct')

<div id="addEmployeeModal" class="modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="employeeForm" method="post" action="/addproducts" enctype="multipart/form-data">
                @csrf
                @method('GET')
                <div class="modal-header">
                    <h4 class="modal-title">Add product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="prix">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="quantity">
                    </div>
                    <div class="form-group">
                        <label>category</label>
                        <select class="form-control" name="category_id" data-placeholder="choose a category">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>tags</label>
                        <input type="text" class="form-control" name="tags">
                    </div>
                    <div class="form-group">
                        <label>Image </label>
                        <input type="file" class="form-control" name="image_path" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
