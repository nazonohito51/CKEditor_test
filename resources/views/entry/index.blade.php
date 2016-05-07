@extends('layouts.entry')

@section('styles')
    <link id="design_css" href="/css/{{{ $design->css }}}" rel="stylesheet">
@stop

@section('content')
    <div class="blog-header">
        <h1 class="blog-title">ブログ</h1>
        <p class="lead blog-description">Laravelリファレンス / サンプルアプリケーション</p>
    </div>
    <div class="row">
        <div class="col-sm-12 blog-main">
            @forelse($page as $row)
                <div class="blog-post">
                    <h2 class="blog-post-title">{{{ $row->title }}}</h2>
                    <p class="blog-post-meta">{{{ $row->created_at }}}</p>
                    <p>{{{ mb_strimwidth(strip_tags($row->body), 0, 30) }}}</p>
                </div>
                <div class="blog-post">
                    <a href="{{{ route('entry.show', [$row->id]) }}}" class="btn btn-info">続きを読む</a>
                </div>
            @empty
                <p>ブログ記事がありません</p>
            @endforelse
            <nav>
                {!! $page->render() !!}
            </nav>
        </div>
    </div>
@stop
