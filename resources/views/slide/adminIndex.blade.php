@extends('admin.layouts.app')

@section('content')

<h2>広告管理</h2>
<a href="{{ route('admin.home') }}">＜戻る</a>

<table>
  <tr>
    <th>タイトル</th>
    <th>画像</th>
    <th>登録日</th>
    <th>更新日</th>
  </tr>
  @foreach($slides as $slide)
  <tr>
    <th>{{ $slide->title }}</th>
    <th> <img src="{{ asset('storage/slide/' . $slide->image_path) }}" alt="{{ $slide->image_path }}"></th>
    <th>{{ $slide->created_at->format('Y/m/d') }}</th>
    <th>{{ $slide->updated_at->format('Y/m/d') }}</th>
    <th><a href="{{ route('admin.slides.edit', ['slide' => $slide->id]) }}">編集</a></th>
  </tr>
  @endforeach
</table>

{{ $slides->links() }}

@endsection
