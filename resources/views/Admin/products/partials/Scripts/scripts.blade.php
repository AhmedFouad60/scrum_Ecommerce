
@push('js')

{{--select2 library    --}}
    <script src="{{URL::to('js/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(".js-example-tags").select2({
            tags: true
        });
    </script>

    <!-- CK Editor -->
<script src="{{URL::to('/Design/adminlte/bower_components/ckeditor/ckeditor.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
<script src="{{URL::to('/Design/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()

            CKEDITOR.replace('editor2')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>



{{--Handle Google Maps--}}
<script>
    var $long=$('#long').val();
    var $lat=$('#lat').val();


    function test() {
        $('#locate').click(function () {

            $long=$('#long').val();
            $lat=$('#lat').val();
            // console.log($lat);
            initMap($long,$lat);

        });
    }



    function initMap($long,$lat) {
        console.log($long);
        console.log($lat);

        var myLatLng = {lat: parseFloat($lat), lng: parseFloat($long)};

        // Create a map object and specify the DOM element
        // for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 4
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            // title: 'Hello World!'
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABfd_XQPAtDKPVWLHogQOvgBJgJx0wEP4&callback=test"
        async defer></script>


@endpush


