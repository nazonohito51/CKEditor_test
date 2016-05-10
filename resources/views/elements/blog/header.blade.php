<nav class="navbar navbar-default">
    <div class="container">
        <a class="blog-nav-item nav navbar-nav navbar-left @if(Request::is('/'))active @endif" href="/entry">HOME</a>
        @if($admin !== 1)
            <a class="blog-nav-item nav navbar-nav navbar-right btn btn-success" href="/api/login">LOGIN</a>
        @endif
    </div>
</nav>
