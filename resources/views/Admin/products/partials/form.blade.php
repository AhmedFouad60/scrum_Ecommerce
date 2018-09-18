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
            {!! Form::label('manufacturer', 'Manufacture:') !!}
            {!! Form::text('manufacturer', null, [ 'class' => 'form-control','name'=>'manufacturer']) !!}
            {!! $errors->first('manufacture') !!}
        </div>

       <div class="form-group">

            @if($mode=='edit')
            <select class="form-control" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"{{ ( $category->id == $productCateID ) ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
            @else

                {!! Form::label('category', 'Category') !!}
                {!! Form::select('category', $categories, null, [ 'class' => 'form-control' ]) !!}
                {!! $errors->first('category') !!}

            @endif
            


        </div>

        <p class="badge label label-primary">Tags</p>
        <div class="form-group">
            @if($mode =='edit')

                <select id="state" class="js-example-basic-single" multiple="multiple" type="text" style="width:90%" name="tags[]">
                
                    @for($i=0;$i < count($productTagsIDs) ;$i++)
                        
                            <option value="{{ $productTagsIDs[$i] }}" selected>
                                    {{$productTagsName[$i]}}
                            </option>
                        
                    @endfor

                    @foreach($AllTags as $Tag)
                        <option value="{{$Tag->id}}">{{$Tag->tag_name}}</option>
                    @endforeach


                </select>

           
            @else
            <select id="state" class="js-example-basic-single" multiple="multiple" type="text" style="width:90%" name="tags[]">

                </select>
            @endif
            

        </div>



    @elseif($tap_name=='location')
        @include('Admin.products.partials.map',['tap_name'=>'location'])



    @elseif($tap_name=='image')
        @if($mode=='edit')

          <div class="row">
          <div class="col-md-4">
                <!-- <p>You can replace these photos</p> -->

                <div class="form-group">
                    <input type="file"  name="photo[]" multiple />
                </div>
            </div>


          


           
          </div>

<br>
<br>
<br>
          <div class="row">
          @for($i=0; $i < count($productPhotos);$i++) 
           <div class="col-md-4">
                <img  class="img-thumbnail" src="{{asset("storage/products/Xs/".$productPhotos[$i])}}" alt="product image">          

           </div>
       
       @endfor
          </div>
         
                   
            

        @else
        <div class="form-group">
            <input type="file"  name="photo[]" multiple />
        </div>
        @endif

        
    @else



    @endif




</div>






