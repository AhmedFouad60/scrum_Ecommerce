<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">post Body
                    <small>Post Content</small>
                </h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    {{--<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"--}}
                    {{--title="Remove">--}}
                    {{--<i class="fa fa-times"></i></button>--}}
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">

                <div class="form-group">
                    {{ Form::label('body', 'body') }}<br>
                    {!!   Form::textarea('body',null, array('class' => 'form-control','id'=>'editor1','rows'=>'10', 'cols'=>'80')) !!}

                </div>



            </div>
        </div>
        <!-- /.box -->


    </div>
    <!-- /.col-->
</div>
<!-- ./row -->

