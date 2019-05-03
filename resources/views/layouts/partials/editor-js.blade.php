<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
<script>
    $(document).ready(function() {
        $('#post-editor').summernote({
            height: 200,
            maxHeight: 500
        });

        $('#post-editor-form').submit(function () {
            var body = $('textarea');
            body.attr('name', 'body');
            body.html($('#post-editor').summernote('code'));
        });

    });
</script>
