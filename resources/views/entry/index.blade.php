@extends('layouts.blog')

@if($admin === 1)
    @section('scripts')
        <script src="/js/bootstrap-dialog/bootstrap-dialog.min.js"></script>
        <script src="/js/bootstrap-switch/bootstrap-switch.min.js"></script>
        <script src="/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="/js/display-switch.js"></script>
    @stop
@endif

@section('styles')
    <style type="text/css" id="blog_design" scoped>
        <!-- @import url(/css/{{{ $design->css }}});-->
    </style>
@stop

@section('content')
    <div class="blog-header">
        <h1 class="blog-title">ブログ</h1>
        <p class="lead blog-description">Laravelサンプルアプリケーション</p>
    </div>
    <div class="row">
        <div class="col-sm-12 blog-main">
            <ul id="sortable" class="list-group">
            @forelse($page as $row)
                <li class="list-group-item" value="{{{ $row->id }}}">
                    @if($admin === 1)
                        <input type="checkbox" class="pull-right" name="display-switch" value="{{{ $row->id }}}" @if($row->public == 1)checked @endif>
                    @endif
                    <div id="blog-post{{{ $row->id }}}" class="blog-post" @if($row->public != 1)style="opacity: 0.6;"@endif>
                        <h2 class="blog-post-title">{{{ $row->title }}}</h2>
                        <p class="blog-post-meta">{{{ $row->created_at }}}</p>
                        <p>{{{ mb_strimwidth(strip_tags($row->body), 0, 100) }}}</p>
                        <a href="{{{ route('entry.show', [$row->id]) }}}" class="btn btn-info">続きを読む</a>
                    </div>
                </li>
            @empty
                <p>ブログ記事がありません</p>
            @endforelse
            </ul>
            {!! $page->render() !!}
        </div>
    </div>
@stop
