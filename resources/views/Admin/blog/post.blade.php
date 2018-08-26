

@extends('Website.Products.layout')

@push('css')
    <link href="{{URL::asset('css/clean-blog.min.css')}}" rel="stylesheet">
    <style>
        body{
            font-family: "Segoe UI", "Segoe WP", "Segoe Regular", "sans-serif";
            font-size: 15px;
            color: #666666;
        }
    </style>

@endpush

@section('content')

    {{--navbar stuff--}}
    @include('Website.Products.Partials.header')

<!-- Navigation -->
{{--@include('Admin.blog.Partials.nav')--}}

<!-- Page Header -->
<header class="masthead" style="background-image: url('http://localhost:8000{{$post->image}}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div style="color:#fff" class="post-heading">
                    <h1 >{{$post->title}}</h1>
                    <h5 class="">
                        {{$post->excerpt}}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Post Content -->
<article>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {!! $post->body !!}
            </div>
        </div>
    </div>



</article>
    <hr><hr>

@include('Admin.blog.Partials.comment')






<hr>
@include('Admin.blog.Partials.footer')

@endsection
