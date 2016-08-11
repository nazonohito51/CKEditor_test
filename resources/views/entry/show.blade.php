@extends('layouts.blog')

@if($admin === 1)
    @section('styles')
        @if(config('editor.editor_type') == 'ckeditor5')
            <link href="{{ asset('ckeditor5/ClassicEditor.css') }}" rel="stylesheet">
        @elseif(config('editor.editor_type') == 'dante')
            <link href="{{ asset('bower_components/dante/dist/css/dante-editor.css') }}" rel="stylesheet">
        @elseif(config('editor.editor_type') == 'medium')
            <link rel="stylesheet" href="{{ asset('bower_components/medium-editor/dist/css/medium-editor.min.css') }}" type="text/css" media="screen" charset="utf-8">
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
            <script>var editor = new MediumEditor('#editor1');</script>
        @elseif(config('editor.editor_type') == 'wysihtml')
            <script src="{{ asset('bower_components/wysihtml/dist/wysihtml-toolbar.min.js') }}"></script>
            <script src="{{ asset('bower_components/wysihtml/parser_rules/advanced_and_extended.js') }}"></script>
            <script>
                var editor = new wysihtml5.Editor('editor1', {
                    toolbar: 'toolbar',
                    parserRules:  wysihtml5ParserRules
                });
            </script>
        @endif
    @stop
@endif

@section('scoped_styles')
    <style type="text/css" id="blog_design" scoped>
        <!-- @import url(/css/{{{ $design->css }}});-->
    </style>
@stop

@section('content')
    <div class="blog-header">
        <h1 class="blog-title">ブログタイトル</h1>
        <p class="lead blog-description">ブログディスクリプション</p>
    </div>
    <div id="sidebar-wrapper"></div>
    <div class="row">
        <div class="col-sm-12 blog-main">
            {{--  ここからはブログ記事の表示です --}}
            <div class="blog-post">
                <h2 class="blog-post-title">{{{ $entry->title }}}</h2>
                <p class="blog-post-meta">{{{ $entry->created_at }}}</p>
                <form method="POST" action="{{{ route('admin.entry.update', ['id' => $id]) }}}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="entry_id" value="{{{ $entry->id }}}">
                    @if($admin === 1 && config('editor.editor_type') == 'wysihtml')
                        <div id="toolbar">
                            <a data-wysihtml5-command="bold">bold</a>
                            <a data-wysihtml5-command="italic">italic</a>
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">H1</a>
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="p">P</a>
                        </div>
                    @endif
                    <div id="editor1" contenteditable="false">
                        {!! $entry->body !!}
                    </div>
                </form>
            </div>
            {{--  ここまでがブログ記事の表示です --}}
            {{--  ここからは記事に対してのコメントフォームとなります --}}
            <div class="row">
                <form id="entry" method="post" action="{{{ route('comment.store') }}}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="entry_id" value="{{{ $entry->id }}}">
                    <div class="form-group col-md-8 @if($errors->first('comment'))has-error @endif">
                        <label class="control-label" for="entry_id">コメント {{ $errors->first('comment') }}</label>
                        <textarea class="form-control" name="comment" id="comment"
                                  placeholder="コメントを入力してください" rows="1"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="name">名前</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="名前" value="{{{ old('name') }}}">
                    </div>
                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-success">コメントを投稿する</button>
                    </div>
                </form>
            </div>
            {{--  ここまでが記事に対してのコメントフォームです --}}
            {{--  ここからは記事に対してのコメントとなります --}}
            <div class="row">
                @foreach($comments as $comment)
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{{ $comment->name }}} / {{{ $comment->created_at }}}
                            </h3>
                        </div>
                        <div class="panel-body word-break">
                            {!! nl2br(e($comment->comment)) !!}
                        </div>
                    </div>
                @endforeach
            </div>
            {{--  ここまでが記事に対してのコメントです --}}
        </div>
    </div>
@stop
