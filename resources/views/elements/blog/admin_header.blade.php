<nav class="navbar navbar-fixed-top">
    <div class="container">
        <a class="blog-nav-item nav navbar-nav navbar-left @if(Request::is('/'))active @endif" href="/entry">HOME</a>
        <a class="blog-nav-item nav navbar-nav navbar-right btn btn-danger" href="/api/logout">LOGOUT</a>
    </div>
</nav>
