@extends('layouts.main')

@section('title', 'Profile')

@section('main')
@include('components.navbar')
<main class="d-flex flex-column align-items-center">
    <h1>My Profile</h1>
    <button class="btn btn-secondary" disabled="disabled">{{$user->role}}</button>
    <p>username: {{$user->username}}</p>
    <p>{{$user->email}}</p>
    <p>{{$user->address}}</p>
    <p>{{$user->phoneNum}}</p>
    @auth
    <div>
        @if (Auth::User()->role == 'member')
        <a href="/updateProfile" class="btn btn-primary">Edit Profile</a>
        @endif
        <a href="/updatePass" class="btn btn-outline-primary">Edit Password</a>
    </div>
    @endauth
</main>
@endsection
