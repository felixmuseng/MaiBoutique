@extends('layouts.main')

@section('title', 'Update Password')

@section('main')
@include('components.navbar')
<main class="d-flex justify-content-center">
    <div class="d-flex flex-column align-items-center border border-dark border-3 rounded" style="background-color:pink; width:25em">
        <h3>Update Profile</h3>
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/updateProfile" method="POST">
            @csrf
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phoneNum" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneNum" name="phoneNum">
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <button type="submit" value="submit" class="btn btn-success" data-bs-dismiss="modal">Save Update</button>
        </form>
    </div>
</main>
@endsection
