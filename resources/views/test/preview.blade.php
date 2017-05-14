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

    <script>
        var preview_window;
        window.addEventListener( 'load', function () {
            preview_window = document.getElementById('preview_window');
        }, false );

        function changeSmartPhonePreview() {
            // iPhone6 Plus
            preview_window.setAttribute('width', 414);
            preview_window.setAttribute('height', 736);
        }
        function changeTabletPreview() {
            // iPad4
            preview_window.setAttribute('width', 768);
            preview_window.setAttribute('height', 1024);
        }
        function changePcPreview() {
            // Mac Air
            preview_window.setAttribute('width', 1440);
            preview_window.setAttribute('height', 900);
        }
    </script>
@endsection

@section('content')
    <header>
        <button class="toggle-button">☰</button>
        <h1>プレビューテスト</h1>
    </header>

    <iframe id="preview_window" src="/admin/entry" sandbox="allow-scripts" width="414" height="736"></iframe>
@stop
