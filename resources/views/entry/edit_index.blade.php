@extends('layouts.blog')

@section('scripts')
    <script src="/js/bootstrap-dialog/bootstrap-dialog.min.js"></script>
    <script src="/js/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script src="/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="/js/display-switch.js"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ul id="sortable" class="list-group">
            @forelse($page as $row)
                <li class="list-group-item">
                    {{{ $row->title }}}
                    <input type="checkbox" class="pull-right" name="display-switch" value="{{{ $row->id }}}" @if($row->public == 1)checked @endif>
                </li>
            @empty
                <p>ブログ記事がありません</p>
            @endforelse
            </ul>
        </div>
    </div>
@stop
