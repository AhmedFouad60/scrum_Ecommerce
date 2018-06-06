@extends('Admin.AdminPanel.home')
@section('stylesheet')
    <link rel="stylesheet" href="{{URL::to('css/main2.css')}}">

@endsection


@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <h2>@yield('title')</h2>
                <div class="pull-right">
                    <i class="btn btn-primary"> +</i>

                    <i class="btn btn-default">-> </i>


                </div>


                @yield('body')

            </div>






        </div>
    </div>
@overwrite