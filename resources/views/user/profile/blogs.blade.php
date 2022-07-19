@extends('user.layouts.app')

@section('content')

@include('user.profile.layout')

<div id="tab02" class="tab blogs">
  <h2>ブログ</h2>
  <div>
    @foreach ($blogs as $blog)
    <a href="{{ route('users.blogs.show', ['blog' => $blog]) }}">
      <p>
        @if($blog->image_1)
        <img src="{{ asset('storage/blog_image/' . $blog->image_1) }}" alt="blog_image">
        @else
        <img src="{{ asset('images/no_image.png') }}" alt="no_image">
        @endif
      </p>
      <p>{{ $blog->title }}</p>
      <p>
        @if($blog->user->icon)
        <img src="{{ asset('storage/user_icon/' . $blog->user->icon) }}" alt="user_icon">
        @else
        <img src="{{ asset('images/default_icon.png') }}" alt="default_icon">
        @endif
      </p>
      <p>{{ $blog->user->name }}</p>
    </a>
    @endforeach
  </div>
  {{ $blogs->links() }}
</div>
@endsection
