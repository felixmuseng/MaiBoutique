@extends('layouts.main')

@section('title', 'Search')

@section('main')
@include('components.navbar')
<main class="d-flex flex-column align-items-center">
    <h1>Search Your Favorite Clothes!</h1>
    <form action="/search" method="GET" class="w-75">
        @csrf
        <div class="input-group mb-4">
            <input type="text" class="form-control" name="search" value="{{$search}}"">
            <button class="btn btn-primary" type="submit" id="search">
                Search
            </button>
        </div>
    </form>
    <div class="w-75">
        <div class="row">
            @if ($products->count() > 0)
                @foreach ($products as $product)
                    @include('components.products')
                @endforeach
            @else
                <div class="text-danger fw-bold">Try another search</div>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {{$products->links()}}
        </div>
    </div>
</main>
@endsection
