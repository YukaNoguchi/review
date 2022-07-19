@extends('user.layouts.app')

@section('content')

<h3>ブログ編集</h3>
@if($errors->any())
<ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</ul>
@endif
<form action="{{ route('users.blogs.update', ['blog' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  <p><input type="text" name="title" placeholder="タイトルを入力…" value="{{ old('title', $blog->title) }}"></p>
  <textarea name="contents" cols="30" rows="10" placeholder="本文を入力…">{{ old('contents', $blog->contents) }}</textarea>
  <p>添付画像</p>
  <ul id="image-list">
    <li><input type="file" name="image[]" class="blog-image"></li>
  </ul>
  <p><button type="submit">投稿</button></p>
</form>

@endsection
