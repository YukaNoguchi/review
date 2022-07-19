@extends('user.layouts.app')

@section('content')

<p>みんなのブログ</p>
@foreach ($blogs as $blog)
@if(auth()->user()->id === $blog->user_id)
<a href="{{ route('users.blogs.edit',  ['blog' => $blog->id]) }}">編集</a>
<form action="{{ route('users.blogs.delete', ['blog' => $blog->id]) }}" method="post">
  @csrf
  <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？")'>
</form>
@endif
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

{{ $blogs->links() }}

@endsection
