<nav class="navbar navbar-fixed-top">
    <div class="container">
        @if($admin_function == 'index')
            <div class="btn-group">
                <a type="button" id="sortButton" class="blog-nav-item btn btn-default navbar-btn navbar-left" href="{{ route('entry.create') }}">記事を新規作成する</a>
                <button type="button" id="sortButton" class="blog-nav-item btn btn-default navbar-btn navbar-left" onclick='sortEntry()'>記事を順番を変更する</button>
            </div>
        @elseif($admin_function == 'create')
            <div class="btn-group">
                <button type="button" id="createButton" class="blog-nav-item btn btn-success navbar-btn navbar-left" onclick='createButton()'>記事を保存する</button>
            </div>
        @elseif($admin_function == 'show')
            <div class="btn-group">
                <button type="button" id="editButton" class="blog-nav-item btn btn-default navbar-btn navbar-left" onclick='switchEditButton({{{ $entry->id }}})'>記事を編集する</button>
                <button type="button" id="sidebarOpener" class="blog-nav-item btn btn-default navbar-btn navbar-left" name="opener">デザインを変更する</button>
                <a class="blog-nav-item btn btn-default navbar-btn navbar-left" data-remodal-target="modal">モーダルを開く</a>
            </div>
        @endif
        <a class="blog-nav-item nav navbar-nav navbar-right btn btn-danger" href="/api/logout">LOGOUT</a>
    </div>
</nav>
