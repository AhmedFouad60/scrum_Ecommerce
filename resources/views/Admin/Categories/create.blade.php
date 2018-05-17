    @extends('Admin.AdminPanel.home')
    @section('breadcrumb')
        <section class="content-header">

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
    @endsection

    @section('content')
        {!! Form::model($data, [ 'route' => 'categories.store' ]) !!}
        @include('Admin.Categories.Partials.form')

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::submit('Create', [ 'class' => 'btn btn-primary' ]) !!}
            </div>
        </div>
        {!! Form::close() !!}

    @endsection