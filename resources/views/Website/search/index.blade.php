@extends('Website.Products.layout')
@push('css')
    <style>
        body{
            height: 1000px;
        }
    </style>
@endpush



@section('content')
    {{--navbar stuff--}}
    @include('Website.Products.Partials.header')


    <div class="container">
        <div class="raw">
            <div class="col-md-8">
                @include('Website.search.Partials.searchProduct')

            </div>

                @include('Website.search.Partials.Tags')

        </div>
    </div>


    {{--Tag system--}}

@endsection