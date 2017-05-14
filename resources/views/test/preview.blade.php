@extends('layouts.test')

@section('styles')
    <style type="text/css">
        body {
            width: 100%;
            height: 100%;
        }

        .slideout-menu {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            z-index: 0;
            width: 256px;
            overflow-y: scroll;
            -webkit-overflow-scrolling: touch;
            display: none;
        }

        .slideout-panel {
            position: relative;
            z-index: 1;
            will-change: transform;
        }

        .slideout-open,
        .slideout-open body,
        .slideout-open .slideout-panel {
            overflow: hidden;
        }

        .slideout-open .slideout-menu {
            display: block;
        }
    </style>
@endsection

@section('side_menu')
    <h2>menu</h2>
@endsection

@section('scripts')
    <script src="/bower_components/slideout.js/dist/slideout.min.js"></script>
    <script>
        var slideout = new Slideout({
            'panel': document.getElementById('panel'),
            'menu': document.getElementById('menu'),
            'padding': 256,
            'tolerance': 70
        });

        document.querySelector('.toggle-button').addEventListener('click', function() {
            slideout.toggle();
        });
    </script>
@endsection

@section('content')
    <header>
        <button class="toggle-button">☰</button>
        <h1>ブログエントリ</h1>
    </header>
    <div>
        <a href="{{{ route('admin.entry.create') }}}" class="btn btn-primary">ブログを投稿する</a>
    </div>
    @if(session('message'))
        <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            {{{ session('message') }}}
        </div>
    @endif
    <table class="table">
        <tr>
            <th>タイトル</th>
            <th>本文</th>
            <th></th>
        </tr>
        @forelse($page as $row)
            <tr>
                <td>{{{ $row->title }}}</td>
                <td>{{{ mb_strimwidth(strip_tags($row->body), 0, 30, "...") }}}</td>
                <td><a href="{{{ route('admin.entry.edit', [$row->id]) }}}">編集</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="3">ブログ記事がありません</td>
            </tr>
        @endforelse
    </table>
    {!! $page->render() !!}

    {{-- iPhone6 Plus --}}
    <iframe src="/admin/entry" sandbox="allow-scripts" width="414" height="736"></iframe>
    {{-- iPad4 --}}
    {{--<iframe src="/admin/entry" sandbox="allow-scripts" width="768" height="1024"></iframe>--}}
    {{-- Mac Air --}}
    {{--<iframe src="/admin/entry" sandbox="allow-scripts" width="1440" height="900"></iframe>--}}
@stop
