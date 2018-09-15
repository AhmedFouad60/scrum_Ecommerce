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


@section('Buttons')
   
    <div class="row">
        <div class="pull-right">
            <a href="products\create" class="btn btn-info" style="margin-right: 30px;"> + Add Product</a>

            {{--<i class="btn btn-default">-> </i>--}}


        </div>

    </div>
@endsection


@section('body')

{{--this class to perform the padding to show the + and --> Buttons in the layout.blade.php--}}




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

    {{--File that contain button of ..print pdf,xlsheet ...--}}


    {{--To trigger the server side--}}

    @push('js')
        <!-- DataTables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

        {!! Html::script('Design/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')!!}
        {!! Html::script('Design/adminlte/bower_components/datatables.net-bs/js/dataTables.buttons.min.js')!!}

        <script src="/vendor/datatables/buttons.server-side.js"></script>


        {!! $dataTable->scripts() !!}
    @endpush

@endsection

