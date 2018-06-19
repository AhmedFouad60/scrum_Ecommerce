@extends('Admin.products.layout')

@section('title') All products

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


@section('buttons')

    {{--  i opened the form here to allow the two buttons to submit the form  --}}
    {{--  ...this may be stupied but i did it till know the best practise--}}


    {{--i decided to remove the button below because this may be miss leading to the user--}}




    {!! Form::open(['url' => 'admin/products','method'=>'post']) !!}



    {{--the buttons in the page --}}

    <div class="row" style="margin-top: 50px">
        <div class="pull-right">

            {!! Form::submit('Save', [ 'class' => 'btn btn-primary' ,'name'=>'newProduct' ]) !!}


            <a class="btn btn-default" href="/admin/products">
                ->
            </a>




        </div>

    </div>
@endsection




@section('body')

    {{--<p>Please, insert new product </p>--}}
    <h3 class="page-header heading-primary-a">+ New product</h3>

    <!-- start nav-taps -->

    <div class="row">

        <div class="tab">

            <ul id="myTab" class="nav nav-tabs" role="tablist">

                <li  class="active"><a href="#general" role="tab" data-toggle="tab">General</a></li>
                <li><a href="#links" role="tab" data-toggle="tab">links</a></li>
                <li><a href="#attribute" role="tab" data-toggle="tab">Attribute</a></li>
                <li><a href="#image" role="tab" data-toggle="tab">Images</a></li>
                <li><a href="#location" role="tab" data-toggle="tab">Location</a></li>

            </ul>

        </div>

        <div id="myTabContent" class="tab-content">

            {!! Form::open(['url' => 'admin/products','method'=>'post']) !!}


            <div class="tab-pane fade in active" id="general">
                @include('Admin.products.partials.form',['tap_name'=>'general'])
            </div>


            <div class="tab-pane fade " id="links">
                @include('Admin.products.partials.form',['tap_name'=>'links'])
            </div>

            <div class="tab-pane fade " id="attribute">
                @include('Admin.products.partials.form',['tap_name'=>'attribute'])
            </div>

            <div class="tab-pane fade " id="location">
                @include('Admin.products.partials.form',['tap_name'=>'location'])
            </div>

            <div class="tab-pane fade " id="image">
                @include('Admin.products.partials.form',['tap_name'=>'image'])
            </div>

        </div>

    </div>





{{--This button may be miss leading for the user--}}

    {{--<div class="col-md-12">--}}
        {{--<div class="form-group">--}}
            {{--{!! Form::submit('Save', [ 'class' => 'btn btn-primary' ,'name'=>'newProduct']) !!}--}}
        {{--</div>--}}
    {{--</div>--}}



    {!! Form::close() !!}

    @push('js')
        <script src="{{URL::to('js/select2.min.js')}}"></script>

        <script type="text/javascript">

            $(".js-example-tags").select2({
                tags: true
            });
        </script>
    @endpush



@endsection