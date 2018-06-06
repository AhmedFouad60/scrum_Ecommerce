<div class="col-md-8">

    @if($tap_form=='general')

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, [ 'class' => 'form-control', 'autofocus' => true ]) !!}
            {!! $errors->first('title') !!}
        </div>
        @else
        <p>fuck you guys</p>

    @endif




</div>