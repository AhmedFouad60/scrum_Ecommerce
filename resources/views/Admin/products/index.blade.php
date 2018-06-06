@extends('Admin.products.layout')
@section('title')
    All products
@overwrite
@section('breadcrumb')
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">products</li>
        </ol>
    </section>
@endsection

@section('body')
    <p>Please, insert new product </p>
    <h3 class="page-header heading-primary-a">services</h3>
    <!-- start nav-taps -->

    <div class="row">

        <div class="tab">

            <ul id="myTab" class="nav nav-tabs" role="tablist">

                <li  class="active"><a href="#general" role="tab" data-toggle="tab">General</a></li>
                <li><a href="#links" role="tab" data-toggle="tab">links</a></li>
                <li><a href="#attribute" role="tab" data-toggle="tab">Attribute</a></li>
                <li><a href="#optional" role="tab" data-toggle="tab">Optional</a></li>
                <li><a href="#image" role="tab" data-toggle="tab">Images</a></li>

            </ul>

        </div>

            <div id="myTabContent" class="tab-content">

                {!! Form::open(['url' => 'admin/product']) !!}


                <div class="tab-pane fade in active" id="general">
                    @include('Admin.products.partials.form',['tap_form'=>'general'])
                </div>


                <div class="tab-pane fade " id="links">
                    @include('Admin.products.partials.form',['tap_form'=>'links'])
                </div>

                <div class="tab-pane fade " id="attribute">
                    @include('Admin.products.partials.form',['tap_form'=>'attribute'])
                </div>

                <div class="tab-pane fade " id="optional">
                    @include('Admin.products.partials.form',['tap_form'=>'optional'])
                </div>

                <div class="tab-pane fade " id="image">
                    @include('Admin.products.partials.form',['tap_form'=>'image'])
                </div>

            </div>

    </div>


    {{--I'll make this button as save button above next  + and ->--}}


    <div class="col-md-12">
        <div class="form-group">
            {!! Form::submit('Create', [ 'class' => 'btn btn-primary' ]) !!}
        </div>
    </div>
    {!! Form::close() !!}





        @section('script')

         @endsection

@endsection