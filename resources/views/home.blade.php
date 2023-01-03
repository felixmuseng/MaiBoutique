@extends('layouts.main')

@section('title', 'Home')

@section('main')
@include('components.navbar')
<main class="d-flex flex-column align-items-center">
    <h1>Find Your Best Clothes Here!</h1>
    <div class="w-75">
        <div class="row">
           @foreach ($products as $product)
                @include('components.products')
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{$products->links()}}
        </div>
    </div>
</main>
@endsection
