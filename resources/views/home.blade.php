@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                       {{--@if(Auth::user()->group_id==0)--}}
                             {{--this is the regular user--}}
                        {{--@else--}}
                            {{--this is the Admin --}}

                            {{--<script type="text/javascript">--}}
                                {{--window.location = "/admin";//here double curly bracket--}}
                            {{--</script>--}}
                         {{--@endif--}}



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
