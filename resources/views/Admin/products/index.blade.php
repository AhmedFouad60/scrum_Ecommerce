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

@section('header')
    <!-- DataTables -->
    {!! Html::style('Design/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')!!}
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>

@endsection


@section('body')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">hover data table</h3>
    </div>

    <div class="box-body">
        {!! $dataTable->table([
       'class'=>'table table-bordered table-hover'
   ]) !!}

    </div>


</div>


@section('footer')
    <!-- DataTables -->
    {!! Html::script('Design/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')!!}
    {!! Html::script('Design/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')!!}
    {!! Html::script('Design/adminlte/bower_components/datatables.net-bs/js/dataTables.buttons.min.js')!!}

    <script src="/vendor/datatables/buttons.server-side.js"></script>

    @push('js')
        {!! $dataTable->scripts() !!}
    @endpush

@endsection




        {{--@section('script')--}}

            {{--{!! $dataTable->scripts() !!}--}}
         {{--@endsection--}}

@endsection