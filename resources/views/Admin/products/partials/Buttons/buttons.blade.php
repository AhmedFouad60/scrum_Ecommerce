
    {{--  i opened the form here to allow the two buttons to submit the form  --}}
    {{--  ...this may be stupied but i did it till know the best practise--}}


    {{--i decided to remove the button below because this may be miss leading to the user--}}




    {!! Form::open(['url' => 'admin/products','method'=>'post','enctype'=>'multipart/form-data']) !!}



    {{--the buttons in the page --}}

    <div class="row" style="margin-top: 50px">
        <div class="pull-right">

            {!! Form::submit('Save', [ 'class' => 'btn btn-primary' ,'name'=>'newProduct' ]) !!}


            <a class="btn btn-default" href="/admin/products">
                ->
            </a>




        </div>

    </div>
