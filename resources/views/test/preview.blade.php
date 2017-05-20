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

    <style type="text/css">
        .blog-preview {
            transition: all 300ms 0s ease;
        }

        /*iPhone6 Plus*/
        .blog-preview__smartphone {
            width: 414px;
            height: 736px;
        }
        /*iPad4*/
        .blog-preview__tablet {
            width: 768px;
            height: 1024px;
        }
        /*Mac Air*/
        .blog-preview__pc {
            width: 1440px;
            height: 900px;
        }
    </style>
@endsection

@section('side_menu')
    <h2>menu</h2>
    <ul>
        <li><button onclick="changeSmartPhonePreview();">スマホ版</button></li>
        <li><button onclick="changeTabletPreview();">タブレット版</button></li>
        <li><button onclick="changePcPreview();">PC版</button></li>
    </ul>
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

    <script>
        var preview_window;
        window.addEventListener( 'load', function () {
            preview_window = document.getElementById('preview_window');
        }, false );

        function changeSmartPhonePreview() {
            preview_window.classList.add('blog-preview__smartphone');
            preview_window.classList.remove('blog-preview__tablet');
            preview_window.classList.remove('blog-preview__pc');

            reloadPreview();
        }
        function changeTabletPreview() {
            preview_window.classList.remove('blog-preview__smartphone');
            preview_window.classList.add('blog-preview__tablet');
            preview_window.classList.remove('blog-preview__pc');

            reloadPreview();
        }
        function changePcPreview() {
            preview_window.classList.remove('blog-preview__smartphone');
            preview_window.classList.remove('blog-preview__tablet');
            preview_window.classList.add('blog-preview__pc');

            reloadPreview();
        }

        function reloadPreview() {
            preview_window.contentWindow.location.reload();
        }
    </script>
@endsection

@section('content')
    <header>
        <button class="toggle-button">☰</button>
        <h1>プレビューテスト</h1>
    </header>

    <iframe id="preview_window" src="/test/blog" sandbox="allow-same-origin" class="blog-preview blog-preview__pc"></iframe>
@stop
