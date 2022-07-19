@extends('admin.layouts.app')

@section('content')

<h2>ユーザー通知新規登録</h2>
@if($errors->any())
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
<form action="{{ route('admin.announces.preview') }}" method="POST">
  @csrf
  <p><input type="text" name="title" placeholder="タイトル※必須" value="{{ old('title') }}"></p>
  <p><textarea name="contents" placeholder="本文※必須" cols="30" rows="10">{{ old('contents') }}</textarea></p>
  <input type="submit" value="プレビュー">
</form>

@endsection
