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

        <h1><i class='fa fa-user-plus'></i> Add Coupon</h1>
        <hr>

        {{ Form::open(array('url' => 'admin/coupons')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('code', 'Code') }}
            {{ Form::text('code', '', array('class' => 'form-control')) }}
        </div>



        <div class="form-group">
            {{ Form::label('description', 'Description') }}<br>
            {{ Form::textarea('description','', array('class' => 'form-control')) }}

        </div>

        <div class="form-group">
            {{ Form::label('discount', 'Discount') }}<br>
            {{ Form::text('discount','', array('class' => 'form-control')) }}

        </div>

        <div class="form-group">
            {{ Form::radio('type','Percentage',true) }} Percentage
            {{ Form::radio('type','Fixed Amount', false) }} Fixed Amount

        </div>
        <div class="form-group">
            <label>start Date:</label>

            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="start_date" class="form-control pull-right" id="start_date">
            </div>
        </div>

        <div class="form-group">
            <label>End Date:</label>

            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="end_date" class="form-control pull-right" id="end_date">
            </div>

        </div>







        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

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

