
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




@endpush


