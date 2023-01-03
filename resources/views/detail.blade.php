@extends('layouts.main')

@section('title', $product->productName )

@php
    $productInCart = false;
    foreach ((array)$cart as $cartItem) {
        if(!$productInCart){
            $productInCart = ($cartItem->product->id == $product->id ? true : false);
        }
    }
@endphp

@section('main')
@include('components.navbar')
<main class="d-flex flex-column align-items-center">
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mt-5 d-flex flex-row justify-content-center" style="width: 80rem">
        <img src="{{ asset('/storage/productimg/'.$product->image) }}" class="card-img-top" style="height: 256px; width:256px">
        <div class="m-3">
            <h2 class="card-title">{{ $product->productName }}</h2>
            <p class="card-text">{{ $product->price }}</p>
            <p class="card-text">{{ $product->detail }}</p>
            @if(Auth::user()->role == 'member')
                <form action="/cartAdd/{{ $product->id }}" method="POST">
                    @csrf
                        <label for="">Quantity :</label>
                        <div>
                            <input type="number" name="quantity" id="quantity">
                            <button class="btn btn-success" type="submit">
                                @if ($productInCart)
                                    Update Cart
                                @else
                                    Add to Cart
                                @endif
                            </button>
                        </div>
                </form>
            @endif
            <a href="/home" type="button" class="btn btn-danger">Back</a>
        </div>
    </div>
</main>
@endsection
