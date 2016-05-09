<nav class="navbar navbar-fixed-top">
    <div class="container">
        @if($admin_function == 'show')
            <button type="button" id="editButton" class="blog-nav-item btn btn-default navbar-btn navbar-left" onclick='switchEditButton({{{ $entry->id }}})'>記事を編集する</button>
            <button type="button" id="sidebarOpener" class="blog-nav-item btn btn-default navbar-btn navbar-left" name="opener">デザインを変更する</button>
        @endif
        <a class="blog-nav-item nav navbar-nav navbar-right btn btn-danger" href="/api/logout">LOGOUT</a>
    </div>
</nav>
