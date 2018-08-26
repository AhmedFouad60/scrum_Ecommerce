@extends('Admin.AdminPanel.index')
@section('header')
    <style>

        .content-wrapper{
            min-height: 816px!important;
        }
    </style>

@endsection


@section('content')

    <h1 class="page-title">
        Edit <span >[{{$post->title}}] Post</span>
    </h1>



    {{ Form::model($post, array('route' => array('blog.update', $post->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

    <div class="row">
        <div class="col-md-8">
            <!-- ### TITLE ### -->
            <div class="panel">

                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-newspaper-o"></i> Post Title
                        <span class="panel-desc"> The title for your post</span>
                    </h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('title', 'title') }}
                        {{ Form::text('title', null, array('class' => 'form-control')) }}
                    </div>

                </div>
            </div>

            <!-- ### CONTENT ### -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Post Content</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                    </div>
                </div>

                <div class="panel-body">

                    @include('Admin.blog.admin.Partials.edit_bodyEditor')


                </div>
            </div><!-- .panel -->

            <!-- ### EXCERPT ### -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Excerpt <small>Small description of this post</small></h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    {{ Form::textarea('excerpt',null, array('class' => 'form-control','rows'=>2,'cols'=>40)) }}
                </div>
            </div>
            {{ Form::submit('Publish', array('class' => 'btn btn-primary')) }}

            {{--<div class="panel">--}}
            {{--<div class="panel-heading">--}}
            {{--<h3 class="panel-title">Additional Fields</h3>--}}
            {{--<div class="panel-actions">--}}
            {{--<a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}

            {{--</div>--}}
            {{--</div>--}}

        </div>
        <div class="col-md-4">
            <!-- ### DETAILS ### -->
            <div class="panel panel panel-bordered panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon wb-clipboard"></i> Post Details</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="status">Post Status</label>

                        <div class="form-group">
                            <select class="form-control" name="status">
                                @for ($i = 0; $i < 3; $i++)
                                    <option value="{{ ($state[$i]==$post->status) ? $post->status : $state[$i] }}"{{ ( $state[$i]==$post->status ) ? 'selected' : '' }}>{{ $state[$i] }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>
                    <div class="form-group">

                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"{{ ( $category->id == $post->category_id ) ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            <!-- ### IMAGE ### -->
            <div class="panel panel-bordered panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon wb-image"></i> Post Image</h3>
                    <div class="panel-actions">
                        <a class="panel-action" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <img src="http://localhost:8000{{$post->image}}" style="width:100%">
                    {{--<input type="file" name="image">--}}
                    <div class="input-group">
                               <span class="input-group-btn">
                                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                   <i class="fa fa-picture-o"></i> Choose
                                 </a>
                               </span>
                            {{ Form::text('image', null, array('class' => 'form-control')) }}
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                </div>
            </div>

            <!-- ### SEO CONTENT ### -->
            <div class="panel panel-bordered panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon wb-search"></i> SEO Content</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" name="meta_description">This is the meta description</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea class="form-control" name="meta_keywords">keyword1, keyword2, keyword3</textarea>
                    </div>
                    <div class="form-group">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" class="form-control" name="seo_title" placeholder="SEO Title" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--        {{ Form::submit('Publish', array('class' => 'btn btn-primary')) }}--}}

    {{ Form::close() }}







@endsection


@push('js')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>


@endpush



@include('Admin.blog.admin.Partials.scripts')

