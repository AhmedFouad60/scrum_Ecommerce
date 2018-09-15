<div class="col-md-8">

    @if($tap_name=='general')

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, [ 'class' => 'form-control', 'autofocus' => true ]) !!}
            {!! $errors->first('title') !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', null, [ 'class' => 'form-control']) !!}
            {!! $errors->first('price') !!}
        </div>
        <div class="form-group">
            {!! Form::label('weight', 'Weight:') !!}
            {!! Form::text('weight', null, [ 'class' => 'form-control']) !!}
            {!! $errors->first('weight') !!}
         </div>
        <div class="form-group">
            {!! Form::label('quantity', 'Quantity:') !!}
            {!! Form::text('quantity', null, [ 'class' => 'form-control']) !!}
            {!! $errors->first('quantity') !!}
         </div>

        @elseif($tap_name=='links')
                <div class="form-group">
                        {!! Form::label('manufacture', 'Manufacture:') !!}
                        {!! Form::text('manufacture', null, [ 'class' => 'form-control','name'=>'manufacturer']) !!}
                        {!! $errors->first('manufacture') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category', 'Category') !!}
                    {!! Form::select('category', $categories, null, [ 'class' => 'form-control' ]) !!}
                    {!! $errors->first('category') !!}
                </div>

                <p class="badge label label-primary">Tags</p>
                <div class="form-group">
                    <select class="js-example-tags form-control" style="width: 100%!important;" multiple="multiple" name="tags[]">

                    </select>
                </div>



        @elseif($tap_name=='location')
        @include('Admin.products.partials.map',['tap_name'=>'location'])



    @elseif($tap_name=='image')

             <div class="form-group">
                <input type="file"  name="photo[]" multiple />
            </div> 
        @else



    @endif




</div>
