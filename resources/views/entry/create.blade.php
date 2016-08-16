@extends('layouts.blog')

@if($admin === 1)
    @include('elements.entry.editor')
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
                <h2 class="blog-post-title">{{{ old('title') }}}</h2>
                <form method="POST" action="{{{ route('admin.entry.store') }}}">
                    {!! csrf_field() !!}
                    @if($admin === 1 && config('editor.editor_type') == 'wysihtml')
                        <div id="toolbar">
                            <a data-wysihtml5-command="bold">bold</a>
                            <a data-wysihtml5-command="italic">italic</a>
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">H1</a>
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="p">P</a>
                        </div>
                    @endif
                    <div id="editor1" contenteditable="false">
                        {!! old('title') !!}
                    </div>
                </form>
            </div>
            {{--  ここまでがブログ記事の表示です --}}
        </div>
    </div>
@stop
