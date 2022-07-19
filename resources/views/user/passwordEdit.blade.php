@extends('user.layouts.app')
@section('content')

<p>パスワード変更</p>
@error('password')
<p>{{ $message }}</p>
@enderror
<form action="{{ route('users.password.update', $user->id) }}" method="post">

  @csrf

  @method('PUT')

  <div><input type="password" name="old_password" value="{{ $user->password }}" readonly></div>
  <div><input type="password" name="password" placeholder="新しいパスワード">※4文字以上半角英数字のみ</div>
  <div><input type="password" name="password_confirmation" placeholder="新しいパスワード（確認）"></div>
  <input class="send" type="submit" value="登録">
</form>
@endsection
