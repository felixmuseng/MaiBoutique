@extends('layouts.main')

@section('title', 'Update Password')

@section('main')
@include('components.navbar')
<main class="d-flex justify-content-center">
    <div class="d-flex flex-column align-items-center border border-dark border-3 rounded" style="background-color:pink; width:25em">
        <h3>Update Password</h3>
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/updatePass" method="POST">
            @csrf
            <div class="form-group">
                <label for="price" class="form-label">Old Password</label>
                <input type="password" class="form-control" id="oldPass" name="oldPass">
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">New Password</label>
                <input type="password" class="form-control" id="newPass" name="newPass">
            </div>
            <button type="submit" value="submit" class="btn btn-success" data-bs-dismiss="modal">Submit</button>
        </form>
    </div>
</main>
@endsection
