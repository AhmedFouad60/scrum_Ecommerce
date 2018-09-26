
    {{--  i opened the form here to allow the two buttons to submit the form  --}}
    {{--  ...this may be stupied but i did it till know the best practise--}}


    {{--i decided to remove the button below because this may be miss leading to the user--}}

    @if($mode=='edit')
        {{ Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PUT','files'=>true)) }}{{-- Form model binding to automatically populate our fields with permission data --}}
    @else
        {!! Form::open(['url' => 'admin/products','method'=>'post','enctype'=>'multipart/form-data']) !!}


    @endif



    {{--the buttons in the page --}}

    <div class="row" style="margin-top: 50px">
        <div class="pull-right">

            {!! Form::submit('Save', [ 'class' => 'btn btn-primary' ,'name'=>'newProduct' ]) !!}


            <a class="btn btn-default" href="/admin/products">
                ->
            </a>




        </div>

    </div>






















