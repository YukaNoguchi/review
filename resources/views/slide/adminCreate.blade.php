@extends('admin.layouts.app')

@section('content')

<h2>広告新規登録</h2>
<a href="{{ route('admin.home') }}">＜戻る</a>

<form action="{{ route('admin.slides.preview') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div>
    <p>タイトル</p>
    <input type="text" name="title" value="タイトル">
  </div>
  @error('title')
  <p>{{ $message }}</p>
  @enderror
  <div>
    <input type="file" name="image">
  </div>
  @error('image')
  <p>{{ $message }}</p>
  @enderror
  <input type="submit" value="プレビュー">
</form>

@endsection