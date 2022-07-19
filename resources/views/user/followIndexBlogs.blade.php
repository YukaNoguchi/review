@extends('user.layouts.app')

@section('content')

<h2>フォロー画面</h2>
<h3><a href="{{ route('users.follows.index', ['tab' => null]) }}">
ブログ</a></h3>
<h3><a href="{{ route('users.follows.index', ['tab' => 1]) }}">
口コミ</a></h3>

@foreach($users->follows as $follow)
@foreach($follow->blogs as $blog)
<a href="{{ route('users.blogs.show', ['blog' => $blog->id]) }}">
  <div>
    @if($blog->image_1)
    <img src="{{ asset('storage/blog_image/' . $blog->image_1) }}" alt="{{ $blog->image_1 }}">
    @else
    <img src="{{ asset('images/no_image.png') }}" alt="no_image">
    @endif
  </div>
  <p>{{ $blog->title }}</p>
  <div>
    @if($follow->icon)
    <img src="{{ asset('storage/user_icon/' . $follow->icon) }}" alt="{{ $follow->icon }}">
    @else
    <img src="{{ asset('images/default_icon.png') }}" alt="default_icon">
    @endif
  </div>
  <p>{{ $follow->name }}</p>
</a>
@endforeach
@endforeach


@endsection