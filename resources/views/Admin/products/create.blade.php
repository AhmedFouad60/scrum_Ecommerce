@extends('Admin.products.layout')

@push('css')

@endpush

 {{-- TODO: for all views in the project ::=> alert to show the errors of the validation i.e(the filed is required ..)  --}}

 

@section('title') Create product

@overwrite



@section('breadcrumb')
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class=""><a href="/admin/products">products</a></li>
            <li class="active"><a href="#">New product</a></li>
        </ol>
    </section>
@endsection




{{--Add and back buttons--}}
@section('Buttons')
    @include('Admin.products.partials.Buttons.buttons',['mode'=>'add'])
@endsection




@section('body')

    {{--<p>Please, insert new product </p>--}}
    <h3 class="page-header heading-primary-a">+ New product</h3>

    @if(!empty($errors->first()))
    <div class="row col-lg-12">
        <div class="alert alert-danger">
            <span>{{ $errors->first() }}</span>
        </div>
    </div>
@endif


    <!-- start nav-taps -->

    <div class="row">

        <div class="tab">

            <ul id="myTab" class="nav nav-tabs" role="tablist">

                <li  class="active"><a href="#general" role="tab" data-toggle="tab">General</a></li>
                <li><a href="#des" role="tab" data-toggle="tab">Description</a></li>
                <li><a href="#links" role="tab" data-toggle="tab">links</a></li>
                <li><a href="#image" role="tab" data-toggle="tab">Images</a></li>
                <li><a href="#location" role="tab" data-toggle="tab">Location</a></li>

            </ul>

        </div>

        <div id="myTabContent" class="tab-content">

            {!! Form::open(['url' => 'admin/products','method'=>'post']) !!}


            <div class="tab-pane fade in active" id="general">
                @include('Admin.products.partials.form',['tap_name'=>'general','mode'=>'add'])
            </div>

            <div class="tab-pane fade" id="des">
                @include('Admin.products.partials.Editor',['mode'=>'add'])
            </div>


            <div class="tab-pane fade " id="links">
                @include('Admin.products.partials.form',['tap_name'=>'links','mode'=>'add'])
            </div>



            <div class="tab-pane fade " id="location">
                @include('Admin.products.partials.form',['tap_name'=>'location','mode'=>'add'])
            </div>

            <div class="tab-pane fade " id="image">
                @include('Admin.products.partials.form',['tap_name'=>'image','mode'=>'add'])
            </div>

        </div>

    </div>

    {!! Form::close() !!}


{{--scripts for ... select2 lib ,html editors--}}
    @include('Admin.products.partials.Scripts.scripts')

@endsection