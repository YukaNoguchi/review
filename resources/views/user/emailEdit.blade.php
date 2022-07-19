@extends('user.layouts.app')
@section('content')

<p>メールアドレス変更</p>
@error('email')
<p>{{ $message }}</p>
@enderror
<form action="{{ route('users.email.update', $user->id) }}" method="post" enctype="multipart/form-data">

  @csrf

  @method('PUT')
  <div><input type="text" name="old_email" value="{{ $user->email }}" readonly></div>
  <div><input type="text" name="email" placeholder="新しいメールアドレス"></div>
  <input class="send" type="submit" value="登録">

</form>
@endsection
