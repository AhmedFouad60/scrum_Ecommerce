@extends('Admin.AdminPanel.index')
@section('header')
    <style>

        .content-wrapper{
            min-height: 816px!important;
        }
    </style>

@endsection


@section('content')



    <div class='col-lg-11 col-lg-offset-1'>

        <h1><i class='fa fa-user-plus'></i> Edit {{$coupon->name}}</h1>
        <hr>

        {{ Form::model($coupon, array('route' => array('coupons.update', $coupon->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with coupon data --}}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('code', 'Code') }}
            {{ Form::text('code', null, array('class' => 'form-control')) }}
        </div>



        <div class="form-group">
            {{ Form::label('description', 'Description') }}<br>
            {{ Form::textarea('description',null, array('class' => 'form-control')) }}

        </div>

        <div class="form-group">
            {{ Form::label('discount', 'Discount') }}<br>
            {{ Form::text('discount',null, array('class' => 'form-control')) }}

        </div>

        <div class="form-group">
            {{--{{dd($coupon->type)}}--}}
            {{ Form::radio('type','Percentage',$coupon->type=='Percentage'?true:false) }} Percentage
            {{ Form::radio('type','Fixed Amount',$coupon->type=='Fixed Amount'?true:false) }} Fixed Amount

        </div>


        <div class="form-group">
            {{ Form::label('start_date', 'start Date:') }}

            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text('start_date',null, array('class' => 'form-control pull-right','id'=>'start_date')) }}

            </div>
        </div>

        <div class="form-group">
            {{ Form::label('end_date', 'End Date:') }}

            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text('end_date',null, array('class' => 'form-control pull-right','id'=>'end_date')) }}

            </div>
        </div>







        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection

@push('js')

    <!-- daterangepicker -->
    <script src="{{URL::to('/Design/adminlte/bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{URL::to('/Design/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{URL::to('/Design/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

    <script>

        $(function () {
            $('#start_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'

            });
            $('#end_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'

            });




        })
    </script>

@endpush

