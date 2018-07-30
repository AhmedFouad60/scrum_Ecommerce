@extends('Website.Products.layout')
@section('content')

    @include('Website.Products.Partials.header')

    <div class="cart-view">
        @include('Website.Products.Partials.cartView')

    </div>

@endsection

