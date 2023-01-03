@extends('layouts.main')

@section('title', 'History')

@section('main')
@include('components.navbar')
<div class="d-flex flex-column align-items-center">
    @foreach ($transactions as $transaction)
        @include('components.historycards')

    @endforeach
</div>
@endsection
