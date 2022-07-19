@extends('user.layouts.logout')

@section('content')

<p>新規登録</p>
@if($errors->any())
<ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</ul>
@endif
<form method="POST" action="{{route('register')}}">
  @csrf
  <table>
    <tr>
      <th>ユーザー名</th>
      <td>
        <input type="name" name="name" value="{{ old('name') }}">
      </td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td>
        <input type="email" name="email" value="{{ old('email') }}">
      </td>
    </tr>
    <tr>
      <th>パスワード</th>
      <td>
        <input type="password" name="password" value="">
      </td>
    </tr>
    <tr>
      <th>パスワード 確認</th>
      <td>
        <input type="password" name="password_confirmation" value="">
      </td>
    </tr>
    <tr>
      <td>
        <button>登録</button>
      </td>
    </tr>
  </table>
</form>

@endsection
