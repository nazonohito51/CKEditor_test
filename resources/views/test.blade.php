@extends('layouts.entry')
@section('content')
    <form method="post" action="{{ route('test') }}">
        {!! csrf_field() !!}
        <div class="form-group @if($errors->first('name'))has-error @endif">
            <label class="control-label" for="name">名前</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="名前を入力してください" value="{{{ old('name') }}}">
        </div>
        <div class="form-group @if($errors->first('email'))has-error @endif">
            <label class="control-label" for="email">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="メールアドレスを入力してください" value="{{{ old('email') }}}">
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit" class="btn btn-success">アカウント作成</button>
    </form>
@stop
