@extends('user.layouts.app')

@section('content')

<p>
  @if($blog->user->icon)
  <img src="{{ asset('storage/user_icon/' . $blog->user->icon) }}" alt="user_icon">
  @else
  <img src="{{ asset('images/default_icon.png') }}" alt="default_icon">
  @endif
</p>
<p>{{ $blog->user->name }}</p>
<p>{{ $blog->title }}</p>
<a href="#">フォローする</a>
<hr>
<p>{!! nl2br(e($blog->contents)) !!}</p>
@if($blog->image_1)
<img src="{{ asset('storage/blog_image/' . $blog->image_1) }}" alt="blog_image_1">
@endif
@if($blog->image_2)
<img src="{{ asset('storage/blog_image/' . $blog->image_2) }}" alt="blog_image_2">
@endif
@if($blog->image_3)
<img src="{{ asset('storage/blog_image/' . $blog->image_3) }}" alt="blog_image_3">
@endif
@if($blog->image_4)
<img src="{{ asset('storage/blog_image/' . $blog->image_4) }}" alt="blog_image_4">
@endif
<p>{{ $blog->created_at->format('Y.m.d') }}</p>


@endsection
