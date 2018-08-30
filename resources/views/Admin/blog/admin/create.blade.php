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
        Create Post
    </h1>



    {{ Form::open(array('url' => 'admin/blog')) }}

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
                        {{ Form::text('title', '', array('class' => 'form-control')) }}
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

                        @include('Admin.blog.admin.Partials.bodyEditor')
                        {{--<div class="form-group">--}}
                            {{--{{ Form::label('body', 'body') }}<br>--}}
                            {{--{{ Form::textarea('body','', array('class' => 'form-control')) }}--}}

                            {{--</div>--}}

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
                        {{ Form::textarea('excerpt','', array('class' => 'form-control','rows'=>2,'cols'=>40)) }}
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
                            <select class="form-control" name="status">
                                <option value="PUBLISHED" selected="selected">published</option>
                                <option value="DRAFT">draft</option>
                                <option value="PENDING">pending</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Post Category</label>
                            <select class="form-control" name="category_id">

                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
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
                        {{--<img src="http://localhost:8000/storage/posts/post1.jpg" style="width:100%">--}}
                        {{--<input type="file" name="image">--}}
                        <div class="input-group">
                               <span class="input-group-btn">
                                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                   <i class="fa fa-picture-o"></i> Choose
                                 </a>
                               </span>
                            <input id="thumbnail" class="form-control" type="text" name="image">
                        </div>
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

{{--    {{ Form::submit('Publish', array('class' => 'btn btn-primary')) }}--}}

    {{ Form::close() }}







@endsection


@push('js')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>


@endpush



@include('Admin.blog.admin.Partials.scripts')






{{--<div class='col-lg-11 col-lg-offset-1'>--}}

    {{--<h1><i class='fa fa-user-plus'></i> Add Coupon</h1>--}}
    {{--<hr>--}}

    {{--{{ Form::open(array('url' => 'admin/blog')) }}--}}

    {{--<div class="form-group">--}}
        {{--{{ Form::label('title', 'title') }}--}}
        {{--{{ Form::text('title', '', array('class' => 'form-control')) }}--}}
    {{--</div>--}}





    {{--<div class="form-group">--}}
        {{--{{ Form::label('body', 'body') }}<br>--}}
        {{--{{ Form::textarea('body','', array('class' => 'form-control')) }}--}}

    {{--</div>--}}









    {{--{{ Form::submit('Add', array('class' => 'btn btn-primary')) }}--}}

    {{--{{ Form::close() }}--}}

{{--</div>--}}


