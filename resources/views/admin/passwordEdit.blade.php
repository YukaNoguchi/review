@extends('admin.layouts.app')
@section('content')

<p>パスワード変更</p>
@error('password')
<p>{{ $message }}</p>
@enderror
<form action="{{ route('admin.password.update') }}" method="POST">
  @csrf
  <p><input type="password" value="●●●●●●●●" disabled></p>
  <p><input type="password" name="password" placeholder="新しいパスワード">※4文字以上半角英数字のみ</p>
  <p><input type="password" name="password_confirmation" placeholder="新しいパスワード（確認）"></p>
  <input type="submit" value="登録">
</form>
@endsection
