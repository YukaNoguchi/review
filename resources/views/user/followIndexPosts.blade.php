@extends('user.layouts.app')

@section('content')

<h2>フォロー画面</h2>
<h3><a href="{{ route('users.follows.index', ['tab' => null]) }}">
ブログ</a></h3>
<h3><a href="{{ route('users.follows.index', ['tab' => 1]) }}">
口コミ</a></h3>

@foreach($users->follows as $follow)
@foreach($follow->posts as $post)
<a href="{{ route('users.products.show', ['product' => $post->product->id]) }}">
  <div>
    @if($follow->icon)
    <img src="{{ asset('storage/user_icon/' . $follow->icon) }}" alt="{{ $follow->icon }}">
    @else
    <img src="{{ asset('images/default_icon.png') }}" alt="default_icon">
    @endif
    <p>{{ $follow->name }}</p>
    <p>{{ $post->point }}</p>
    <p>{{ $post->comment }}</p>
  </div>
  <div>
    @if($post->product->images)
    <img src="{{ asset('storage/user_icon/' . $post->product->images) }}" alt="{{ $post->product->images }}">
    @else
    <img src="{{ asset('images/no_image.png') }}" alt="no_image">
    @endif
    <p>{{ $post->product->name }}/{{ $post->product->brand }}</p>
  </div>
</a>
@endforeach
@endforeach


@endsection