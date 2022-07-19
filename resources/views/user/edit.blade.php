@extends('user.layouts.app')
@section('content')

<p>プロフィール編集</p>
@if($errors->any())
<ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</ul>
@endif
<form action="{{ route('users.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">

  @csrf

  @method('PUT')

  <div>
    @if($user->icon)
    <img src="{{ asset('storage/user_icon/' . $user->icon) }}" alt="ユーザーアイコン">
    @else
    <img src="{{ asset('images/default_icon.png') }}" alt="default_icon">
    @endif
  </div>
  <input type="file" name="file">
  <div>ユーザー名</div>
  <div><input type="text" name="name" value="{{ $user->name }}"></div>
  <div><input type="text" name="bio" value="{{ $user->bio }}"></div>
  <div>
    <select name="gender">
      <option value="1">女性</option>
      <option value="2">男性</option>
    </select>
  </div>
  <div>
    <label for="birthday">
      <input type="date" name="birthday" value="{{ $user->birthday }}">
  </div>
  <input type="hidden" name="id" value="{{ $user->id }}">
  <input class="send" type="submit" value="編集">
</form>
@endsection
