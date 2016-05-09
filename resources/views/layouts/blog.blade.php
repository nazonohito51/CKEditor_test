<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('description', config('blog.description'))">
    <meta name="keywords" content="@yield('keywords', config('blog.keywords'))"/>
    <title>@yield('title', config('blog.title', 'Blog'))</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-dialog/bootstrap-dialog.min.css" rel="stylesheet">
    <link href="/css/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="apple-touch-icon" href="/favicon.png">
    <link rel="icon" href="/favicon.png">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Navbar goes here -->
@if($admin === 1)
    @include('elements.blog.admin_header')
@else
    @include('elements.blog.header')
@endif
<div class="container" id="main">
    @yield('styles')
    @yield('content')
</div>
<script src="/js/jquery/jquery.min.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
@yield('scripts')
</body>
</html>
