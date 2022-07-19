@extends('admin.layouts.app')

@section('content')

<h2>ユーザー通知編集</h2>
@if($errors->any())
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
<form action="{{ route('admin.announces.editPreview') }}" method="POST">
  @csrf
  <p><input type="text" name="title" placeholder="タイトル※必須" value="{{ old('title', $announce->title) }}"></p>
  <p><textarea name="contents" placeholder="本文※必須" cols="30" rows="10">{{ old('contents', $announce->contents) }}</textarea></p>
  <input type="submit" form="delete" value="削除" onclick='return confirm("本当に削除しますか？")'>
  <input type="submit" value="プレビュー">
  <input type="hidden" name="id" value="{{ $announce->id }}">
</form>
<form id="delete" action="{{ route('admin.announces.delete', ['announce' => $announce->id]) }}" method="POST">
  @method('DELETE')
  @csrf
</form>

@endsection
