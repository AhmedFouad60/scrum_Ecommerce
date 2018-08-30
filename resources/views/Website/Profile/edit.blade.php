@extends('Website.Products.layout')
@push('css')
    <style>
        body{
            height: 1000px;
        }
    </style>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::to('Design/adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
@endpush



@section('content')
    {{--navbar stuff--}}
    @include('Website.Products.Partials.header')


<div class="container" style="padding-top: 60px;">
    <h1 class="page-header">Edit Profile</h1>

    {{ Form::model($user, array('route' => array('profileStore',$user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

    <img src="{{$user->picture}}" style="width: 200px;" class="" alt="avatar">

    <div class="row">
        <!-- left column -->
        <div class="col-md-4 col-sm-6 col-xs-12">




            <div class="form-group" style="margin-top:20px;">
                               <span class="input-group-btn">
                                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                   <i class="fa fa-picture-o"></i> Choose
                                 </a>
                               </span>
                <input id="thumbnail"  class="form-control" type="hidden" name="image">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            {{--<div class="alert alert-info alert-dismissable">--}}
                {{--<a class="panel-close close" data-dismiss="alert">×</a>--}}
                {{--<i class="fa fa-coffee"></i>--}}
                {{--This is an <strong>.alert</strong>. Use this to show important messages to the user.--}}
            {{--</div>--}}
            <h3>Personal info</h3>

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Password') }}<br>
                {{ Form::password('password', array('class' => 'form-control')) }}

            </div>

            <div class="form-group">
                {{ Form::label('password', 'Confirm Password') }}<br>
                {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

            </div>
            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}


            {{ Form::close() }}
        </div>
    </div>
</div>
    @endsection
@push('js')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    $(function () {

        $('#lfm').filemanager('image');





    })
</script>

@endpush