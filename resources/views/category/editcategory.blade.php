@extends('layout')
@section('editcategory')
    <form method="post" id="forms" action="/updateCategory"  enctype="multipart/form-data">
        @csrf
        <input type="number" class="form-control task-desc" name="id" value="{{ $category->id }}" hidden>

        <div class="mb-4">
            <label class="form-label">Name</label>
            <input type="text" class="form-control task-desc" name="name" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <img src="/img/{{ $category->image_path }}" width="300px">
            <input type="file" class="form-control" name="image_path" accept="image/*">
            </label>
        </div>
        <div class="d-flex w-100 justify-content-center">
            <button type="submit" class="btn btn-success btn-block mb-4 me-4 save">Save Edit</button>
            <a href="">
                <div class="btn btn-danger btn-block mb-4 annuler">Annuler</div>
            </a>
        </div>
    </form>
@endsection
