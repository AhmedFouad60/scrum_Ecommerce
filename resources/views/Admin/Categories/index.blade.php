    @extends('Admin.Categories.layout')
    @section('title')
        All categories
    @overwrite
    @section('breadcrumb')
        <section class="content-header">

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
    @endsection

    @section('body')
        <p>Please, select a category from menu to the right.</p>
    @endsection