{!! Form::open(['url' => '/product/review','method'=>'post','id'=>'product-review']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::text('title', null, ['placeholder'=>'Title', 'class' => 'form-control']) !!}

        </div>
    </div>
</div>
{!!Form::hidden('product_id',$product->id)!!}
{!!Form::hidden('user_id', Auth::user()->id)!!}

<div class="form-group">
    {!!Form::textarea('description',null,['class'=>'form-control','rows'=>'3','placeholder'=>'Write your review here...'])

        !!}
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="input-1" class="control-label">Rate This</label>

            <div class="star-rate"></div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary add-review">Submit</button>
{!! Form::close() !!}










