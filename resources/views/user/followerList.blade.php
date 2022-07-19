@extends('user.layouts.app')

@section('content')

<h2>フォロワー一覧</h2>
@foreach($user->followers as $follower)
<a href="{{ route('users.profiles.show', ['user' => $follower->id]) }}">
  <p>{{ $follower->name }}</p>
  @if($follower->icon)
  <img src="{{ asset('storage/blog_image/' . $follower->icon) }}" alt="{{ $follower->icon }}">
  @else
  <img src="{{ asset('images/mypage.png') }}" alt="mypage">
  @endif
</a>
@if(in_array($follower->id, array_column($followList, 'followed_id')))
<div>
  <form action="{{ route('users.unfollow', ['user' => $follower->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="フォロー中">
  </form>
</div>
@else
<div>
  <form action="{{ route('users.follow', ['user' => $follower->id]) }}" method="post">
    @csrf
    <input type="submit" value="フォローする">
  </form>
</div>
@endif
@endforeach

@endsection