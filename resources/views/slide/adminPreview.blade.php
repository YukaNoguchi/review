@extends('admin.layouts.app')

@section('content')

<h2>プレビュー</h2>
<p>{{ $request->title }}</p>
<img src="{{ asset('storage/slide/' . $file_name) }}" alt="{{ $file_name }}">
<form action="{{ route('admin.slides.store')}}" method="post">
  @csrf
  <button type="button" onclick="history.back()">{{ __('修正する') }}</button>
  <button type="submit">{{ __('登録') }}</button>
  <input type="hidden" name="title" value="{{ $request->title }}">
  <input type="hidden" name="image_path" value="{{ $file_name }}">
</form>

@endsection