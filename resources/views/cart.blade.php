@extends('layouts.main')

@section('title', 'Cart')

@section('main')
@include('components.navbar')
<div class="d-flex flex-column">
    <h1 class="align-self-center">My Cart</h1>
    <div class="d-flex align-self-end flex-row">
        <h4 class="px-2">Total Price: Rp.{{$total}}</h4>
        <form action="/cartCheckOut" method="POST">
            @csrf
            <button type="submit"class="btn btn-primary">Check Out</button>
        </form>
    </div>
    <div class="w-75 align-self-center">
        @foreach ((array)$cart as $cartItem)
            @include('components.carts')
        @endforeach

    </div>
</div>
@endsection
