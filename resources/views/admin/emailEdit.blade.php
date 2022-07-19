@extends('admin.layouts.app')

@section('content')

<p>メールアドレス変更</p>
@error('email')
<p>{{ $message }}</p>
@enderror
<form action="{{ route('admin.email.update') }}" method="POST">
  @method('PUT')
  @csrf
  <p><input type="text" value="{{ $user->email }}" disabled></p>
  <p><input type="text" name="email" value="{{ old('email') }}" placeholder="新しいメールアドレス"></p>
  <input type="submit" value="登録">
</form>
@endsection
