@extends('Website.Products.layout')
@push('css')
    <link href="{{URL::asset('css/clean-blog.min.css')}}" rel="stylesheet">

    <style>
        body{
            font-family: "Segoe UI", "Segoe WP", "Segoe Regular", "sans-serif";
            font-size: 15px;
            color: #666666;
        }
        .bloc_left_price {
            color: #c01508;
            text-align: center;
            font-weight: bold;
            font-size: 150%;
        }
        .category_block li:hover {
            background-color: #007bff;
        }
        .category_block li:hover a {
            color: #ffffff;
        }
        .category_block li a {
            color: #343a40;
        }

    </style>
@endpush




@section('content')
    {{--navbar stuff--}}
    @include('Website.Products.Partials.header')



    <section>
        <h1 class="text-center">
            " {{$word}} "

            Category
        </h1>
    </section>

    <div class="container">
        <div class="raw">
            <div class="col-md-4">

                <div class="card bg-light mb-3">
                    <div class="card-header bg-primary text-white text-uppercase" style="padding: 12px;"><i class="fa fa-list"></i> Categories</div>
                    <ul class="list-group category_block">
                        @foreach($categories as $category)
                            <li class="list-group-item">
                                <a href="/search/blog/{{$category->title}}">{{$category->title}}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                @foreach($posts as $post)
                    {{--<div class="post-img">--}}
                    {{--<img class="img-thumbnail" src="{{URL::asset('/storage').'/'.$post->image}}"/>--}}
                    {{--</div>--}}
                    <div class="post-preview">
                        <a href="/blog/{{$post->id}}/{{$post->slug.trim('','-')}}">
                            {{--<div class="post-img">--}}
                            {{--<img class="img-thumbnail" src="{{URL::asset('/storage').'/'.$post->image}}"/>--}}
                            <img class="img-thumbnail" src="http://localhost:8000{{$post->image}}">

                            {{--</div>--}}
                            <h2 class="post-title">
                                {!! $post->title !!}
                            </h2>
                            <h3 class="post-subtitle">
                                {!! $post->excerpt !!}
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="#">{{\App\Models\User::where('id',$post->author_id)->first()->name}}</a>
                            on {{$post->created_at}}</p>
                    </div>
                    <hr>
                @endforeach
                {{ $posts->links() }}

            </div>

{{--            @include('Website.search.Partials.Tags')--}}

        </div>
    </div>


    {{--Tag system--}}

@endsection