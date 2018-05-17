@extends('Admin.Categories.layout')
@section('breadcrumb')
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@endsection

@section('title')
    {{ $category->title }}
@overwrite

@section('body')
        @include('Admin.Categories.Partials.path')
@overwrite