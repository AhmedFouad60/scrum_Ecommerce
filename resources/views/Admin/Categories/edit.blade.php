@extends('Admin.AdminPanel.home')

@section('title')
   {{ $category->title }}
@overwrite

@section('content')
   {!! Form::model($category, [ 'route' => [ 'categories.update', $category->getKey() ], 'method' => 'PATCH' ]) !!}
   @include('Admin.Categories.Partials.form')

   <div class="col-md-12">
   <div class="form-group">
       {!! Form::submit('Save', [ 'class' => 'btn btn-primary' ]) !!}
   </div>
   </div>
   {!! Form::close() !!}

@endsection