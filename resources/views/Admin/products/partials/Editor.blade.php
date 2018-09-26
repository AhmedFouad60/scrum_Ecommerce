<!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">Large Description
                        <small>Detailed description</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-plus"></i></button>
                        {{--<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"--}}
                                {{--title="Remove">--}}
                            {{--<i class="fa fa-times"></i></button>--}}
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <!-- for edit page -->
                    @if($mode == 'edit')
                    <textarea id="editor1" name="large_description" rows="10" cols="80">
                    {!!$product->large_description!!}
                    </textarea>
                    <!-- for create page -->
                    @else
                    <textarea id="editor1" name="large_description" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                    </textarea>
                    @endif
                    

                </div>
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->


<div class="row">
    <div class="col-md-12">
        <div class="box box-default collapsed-box">
            <div class="box-header">
                <h3 class="box-title">Small Description
                    <small>Product small description to appear in google search</small>
                </h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-plus"></i></button>
                    {{--<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"--}}
                    {{--title="Remove">--}}
                    {{--<i class="fa fa-times"></i></button>--}}
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">

                    @if($mode=='edit')
                    
                    <textarea id="editor2" name="small_description" rows="10" cols="80">
                    {!!$product->small_description!!}
                    </textarea>

                    @else
                    <textarea id="editor2" name="small_description" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                    </textarea>
                    @endif
                    

            </div>
        </div>
        <!-- /.box -->


    </div>
    <!-- /.col-->
</div>
<!-- ./row -->


