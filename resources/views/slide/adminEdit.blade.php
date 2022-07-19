@extends('admin.layouts.app')

@section('content')

<h2>スライド広告編集</h2>

<a href="{{ route('admin.slides.index') }}">＜戻る</a>

<form action="{{ route('admin.slides.editPreview') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div>
    <p>タイトル</p>
    <input type="text" name="title" value="{{ old('title', $slide->title) }}">
  </div>
  @error('title')
  <p>{{ $message }}</p>
  @enderror
  <div>
    <p>元の画像</p>
    <img src="{{ asset('storage/slide/' . $slide->image_path) }}" alt="{{ $slide->image_path }}">
    <input type="file" name="image">
  </div>
  @error('image')
  <p>{{ $message }}</p>
  @enderror
  <input type="hidden" name="slide_id" value="{{ $slide->id }}">
  <input type="submit" value="プレビュー">
</form>
<form action="{{ route('admin.slides.delete', ['slide' => $slide->id]) }}" method="post">
  @csrf
  <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？")'>
</form>

@endsection