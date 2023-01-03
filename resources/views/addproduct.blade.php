@extends('layouts.main')

@section('title', 'Add')

@section('main')
@include('components.navbar')
<main class="d-flex justify-content-center">
    <div class="d-flex flex-column align-items-center border border-dark border-3 rounded" style="background-color:pink; width:25em">
        <h3>Add Item</h3>
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/addProduct" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image" class="form-label">Clothes Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="productName" class="form-label">Clothes Name</label>
                <input type="text" class="form-control" id="productName" name="productName">
            </div>
            <div class="form-group">
                <label for="detail" class="form-label">Clothes Desc</label>
                <input type="text" class="form-control" id="detail" name="detail">
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Clothes Price</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Clothes Stock</label>
                <input type="number" class="form-control" id="stock" name="stock">
            </div>
            <button type="submit" value="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
        </form>
    </div>
</main>
@endsection
