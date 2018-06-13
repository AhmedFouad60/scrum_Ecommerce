@extends('Admin.products.layout')


@section('header')
    <!-- DataTables -->
    {!! Html::style('Design/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')!!}
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>

@endsection


    @section('title') All products @endsection



@section('breadcrumb')
    <section class="content-header" style="margin-bottom: 27px;">

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">products</li>
        </ol>
    </section>


@endsection


@section('buttons')
    <div class="row">
    <div class="pull-right">
        <a class="btn btn-primary" href="products\create"> +</a>

        {{--<i class="btn btn-default">-> </i>--}}


    </div>

    </div>
@endsection


@section('body')

{{--this class to perform the padding to show the + and --> buttons in the layout.blade.php--}}




    <div class="box">

        {{--.....Render the Datatables of the products--}}

        <div class="box-header">
            <h3 class="box-title">All Products</h3>
        </div>

        <div class="box-body">

            {!! $dataTable->table([
           'class'=>'table table-bordered table-hover'
       ]) !!}

        </div>


    </div>
    @endsection

    {{--Required libraries for datatables--}}

@section('footer')
    <!-- DataTables -->
    {!! Html::script('Design/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')!!}
    {!! Html::script('Design/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')!!}
    {!! Html::script('Design/adminlte/bower_components/datatables.net-bs/js/dataTables.buttons.min.js')!!}

    {{--File that contain button of ..print pdf,xlsheet ...--}}
    <script src="/vendor/datatables/buttons.server-side.js"></script>


    {{--To trigger the server side--}}

    @push('js')
        {!! $dataTable->scripts() !!}
    @endpush

@endsection

