@extends('Admin.products.layout')

@push('css')

@endpush



@section('title') All products

@overwrite


@section('breadcrumb')
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class=""><a href="/admin/products">products</a></li>
            <li class="active"><a href="#">{{$product->title}}</a></li>
        </ol>
    </section>
@endsection



<!-- {{--Add and back buttons--}}
@section('Buttons')
    @include('Admin.products.partials.Buttons.buttons',['mode'=>'edit'])
@endsection -->




@section('body')

    <h3 class="page-header heading-primary-a">Edit >> {{$product->title}}</h3>

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

        {!! Form::model($product,['method' => 'PUT', 'route' => ['products.update', $product->id],'files' => true]) !!}{{-- Form model binding to automatically populate our fields with permission data --}}



            <div class="tab-pane fade in active" id="general">
                @include('Admin.products.partials.form',['tap_name'=>'general','mode'=>'edit'])
            </div>

            <div class="tab-pane fade" id="des">
                @include('Admin.products.partials.Editor',['mode'=>'edit'])
            </div>


            <div class="tab-pane fade " id="links">
                @include('Admin.products.partials.form',['tap_name'=>'links','mode'=>'edit'])
            </div>



            <div class="tab-pane fade " id="location">
                @include('Admin.products.partials.form',['tap_name'=>'location','mode'=>'edit'])
            </div>

            <div class="tab-pane fade " id="image">
                @include('Admin.products.partials.form',['tap_name'=>'image','mode'=>'edit'])
            </div>

        </div>

    </div>

    {!! Form::close() !!}
   

{{--scripts for ... select2 lib ,html editors--}}
    @include('Admin.products.partials.Scripts.scripts')

@endsection