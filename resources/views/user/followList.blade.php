@extends('user.layouts.app')

@section('content')

<h2>フォロー一覧</h2>
@foreach($user->follows as $follow)
<a href="{{ route('users.profiles.show', ['user' => $follow->id]) }}">
  <p>{{ $follow->name }}</p>
  @if($follow->icon)
  <img src="{{ asset('storage/blog_image/' . $follow->icon) }}" alt="{{ $follow->icon }}">
  @else
  <img src="{{ asset('images/mypage.png') }}" alt="mypage">
  @endif
</a>
@if(in_array($follow->id, array_column($followList, 'followed_id')))
<div>
  <form action="{{ route('users.unfollow', ['user' => $follow->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="フォロー中">
  </form>
</div>
@else
<div>
  <form action="{{ route('users.follow', ['user' => $follow->id]) }}" method="post">
    @csrf
    <input type="submit" value="フォローする">
  </form>
</div>
@endif
@endforeach

@endsection