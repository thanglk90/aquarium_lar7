<script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/scripts.js') }}"></script>
<script src="{{ asset('admin/js/slug.js') }}"></script>
<script src="{{ asset('admin/ckeditor_4.16.2_full/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>

<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>

<script>
    CKEDITOR.replace('introduce_editor', options);
    CKEDITOR.replace('description_editor', options);
</script>
<script>
    $('#lfm').filemanager('image');
</script>

@yield('js')