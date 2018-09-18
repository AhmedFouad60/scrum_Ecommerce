@push('css')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
@endpush
<p>My Location in Google Map <a target="_blank" href="https://www.latlong.net/">you can find yours</a></p>


<div class="form-group">
    {!! Form::text('longitude', null, [ 'class' => 'form-control', 'autofocus' => true,'id'=>'long','placeholder'=>'longitude' ]) !!}
              

</div>

<div class="form-group">
    <!-- <input class="form-control" type="text" id="lat" name="latitude" placeholder="latitude"> -->
    {!! Form::text('latitude', null, [ 'class' => 'form-control','id'=>'lat','placeholder'=>'latitude' ]) !!}

</div>

<div class="form-group">
    <div id="locate" class="btn btn-primary">Locate</div>
</div>

<div id="map"></div>



