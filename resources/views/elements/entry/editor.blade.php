@section('styles')
    @if(config('editor.editor_type') == 'ckeditor5')
        <link href="{{ asset('ckeditor5/ClassicEditor.css') }}" rel="stylesheet">
    @elseif(config('editor.editor_type') == 'dante')
        <link href="{{ asset('bower_components/dante/dist/css/dante-editor.css') }}" rel="stylesheet">
    @elseif(config('editor.editor_type') == 'medium')
        <link rel="stylesheet" href="{{ asset('bower_components/medium-editor/dist/css/medium-editor.min.css') }}" type="text/css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="{{ asset('bower_components/medium-editor/dist/css/themes/bootstrap.css') }}" type="text/css" media="screen" charset="utf-8">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('bower_components/medium-editor-insert-plugin/dist/css/medium-editor-insert-plugin.min.css') }}">
    @elseif(config('editor.editor_type') == 'trumbowyg')
        <link rel="stylesheet" href="{{ asset('bower_components/trumbowyg/dist/ui/trumbowyg.min.css') }}">
    @elseif(config('editor.editor_type') == 'content_tools')
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/ContentTools/build/content-tools.min.css') }}">
    @elseif(config('editor.editor_type') == 'summernote')
        <link href="{{ asset('bower_components/summernote/dist/summernote.css') }}" rel="stylesheet">
    @endif
@stop

@section('scripts')
    <script src="/js/jquery/jquery.simple-sidebar.min.js"></script>
    <script src="/js/sidebar.js"></script>
    <script src="/js/bootstrap-dialog/bootstrap-dialog.min.js"></script>

    @if(config('editor.editor_type') == 'ckeditor')
        <script src="//cdn.ckeditor.com/4.5.8/full-all/ckeditor.js"></script>
        <script src="//cdn.ckeditor.com/4.5.8/full-all/adapters/jquery.js"></script>
        <script src="/js/ckeditor/ckeditor.js"></script>
        @if($admin_function == 'create')
            <script type="text/javascript">
                editArticle();
            </script>
        @endif
    @elseif(config('editor.editor_type') == 'ckeditor5')
        <script src="{{ asset('ckeditor5/ClassicEditor.js') }}"></script>
        <script>
            ClassicEditor.create( document.getElementById( 'editor1' ), {
                toolbar: [ 'headings', 'bold', 'italic', 'undo', 'redo' ]
            } )
                    .then( function( editor ) {
                        window.editor = editor;
                    } )
                    .catch( function( err ) {
                        console.error( err.stack );
                    } );
        </script>
    @elseif(config('editor.editor_type') == 'dante')
        <script src="{{ asset('bower_components/sanitize.js/lib/sanitize.js') }}"></script>
        <script src="{{ asset('bower_components/underscore/underscore-min.js') }}"></script>
        <script src="{{ asset('bower_components/dante/dist/js/dante-editor.js') }}"></script>
        <script type="text/javascript">
            editor = new Dante.Editor(
                    {
                        el: "#editor1",
                        upload_url: "/images.json", //it expect an url string in response like /your/server/image.jpg or http://app.com/images/image.jpg
                        store_url: "/save" //post to save

                    }
            );
            editor.start()
        </script>
    @elseif(config('editor.editor_type') == 'medium')
        <script src="{{ asset('bower_components/medium-editor/dist/js/medium-editor.min.js') }}"></script>
        <script src="{{ asset('bower_components/handlebars/handlebars.runtime.min.js') }}"></script>
        <script src="{{ asset('bower_components/jquery-sortable/source/js/jquery-sortable-min.js') }}"></script>
        <script src="{{ asset('bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js') }}"></script>
        <script src="{{ asset('bower_components/blueimp-file-upload/js/jquery.iframe-transport.js') }}"></script>
        <script src="{{ asset('bower_components/blueimp-file-upload/js/jquery.fileupload.js') }}"></script>
        <script src="{{ asset('bower_components/medium-editor-insert-plugin/dist/js/medium-editor-insert-plugin.min.js') }}"></script>
        <script src="{{ asset('js/medium-editor/medium-editor.js') }}"></script>
    @elseif(config('editor.editor_type') == 'wysihtml')
        <script src="{{ asset('bower_components/wysihtml/dist/wysihtml-toolbar.min.js') }}"></script>
        <script src="{{ asset('bower_components/wysihtml/parser_rules/advanced_and_extended.js') }}"></script>
        <script>
            var editor = new wysihtml5.Editor('editor1', {
                toolbar: 'toolbar',
                parserRules:  wysihtml5ParserRules
            });
        </script>
    @elseif(config('editor.editor_type') == 'trumbowyg')
        <script src="{{ asset('bower_components/trumbowyg/dist/trumbowyg.min.js') }}"></script>
        <script>
            $('#editor1').trumbowyg();
        </script>
    @elseif(config('editor.editor_type') == 'content_tools')
        <script src=" {{ asset('bower_components/ContentTools/build/content-tools.min.js') }}"></script>
        <script>
            window.addEventListener('load', function() {
                var editor;
                editor = ContentTools.EditorApp.get();
                editor.init('#editor1');
            });
        </script>
    @elseif(config('editor.editor_type') == 'summernote')
        <script src="{{ asset('bower_components/summernote/dist/summernote.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#editor1').summernote({
                    airMode: true
                });
            });
        </script>
    @endif
@stop
