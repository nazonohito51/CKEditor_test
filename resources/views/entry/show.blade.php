@extends('layouts.entry')

@section('scripts')
    <script src="//cdn.ckeditor.com/4.5.8/full-all/ckeditor.js"></script>
    <script src="//cdn.ckeditor.com/4.5.8/full-all/adapters/jquery.js"></script>
    <script>
        CKEDITOR.disableAutoInline = true;
        CKEDITOR.plugins.addExternal( 'uploadimage', '/js/ckeditor/plugins/uploadimage/', 'plugin.js' );
        CKEDITOR.on( 'log', function( evt ) {
            // Cancel default listener.
            evt.cancel();
            // Log event data.
            console.log( evt.data.type, evt.data.errorCode, evt.data.additionalData );
        } );
        CKEDITOR.inline('editor1', {
            customConfig: '/js/ckeditor/config.js'
        });
        function postEntry(entryId, entryBody) {
            $('#postEntryButton').val('保存中...');
            $.ajax({
                url: '/api/entry/' + entryId,
                type: 'POST',
                dataType: 'json',
                data: {
                    'body': entryBody
                },
                timeout: 5000,
                success: function(data) {
                    $('#postEntryButton').val('保存完了');
                },
                error: function() {
                    $('#postEntryButton').val('保存に失敗しました');
                }
            })
        }
    </script>
@stop

@section('styles')
    @if (empty($design->css) === false)
        <link href="/css/{{{ $design->css }}}" rel="stylesheet">
    @endif
@stop

@section('content')
    <div class="blog-header">
        <h1 class="blog-title">ブログ</h1>
        <p class="lead blog-description">Laravelリファレンス / サンプルアプリケーション</p>
    </div>
    <div class="row">
        <div class="col-sm-12 blog-main">
            {{--  ここからはブログ記事の表示です --}}
            <div class="blog-post">
                <h2 class="blog-post-title">{{{ $entry->title }}}</h2>
                <p class="blog-post-meta">{{{ $entry->created_at }}}</p>
                <form method="POST" action="{{{ route('admin.entry.update', ['id' => $id]) }}}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="entry_id" value="{{{ $entry->id }}}">
                    <div id="editor1" contenteditable="true">
                        {!! $entry->body !!}
                    </div>
                    <input type="button" class="form-control" id="postEntryButton" name="test" value="保存する" onclick="postEntry({{{ $entry->id }}}, CKEDITOR.instances.editor1.getData())">
                    <input type="button" class="form-control" id="test" name="test2" value="test" onclick='window.alert(CKEDITOR.instances.editor1.getData())'>
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
