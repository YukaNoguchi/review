@extends('admin.layouts.logout')

@section('content')

<p>ログイン</p>
@if($errors->any())
<ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</ul>
@endif
<form method="POST" action="{{route('admin.login')}}">
  @csrf
  <table>
    <tr>
      <th>メールアドレス</th>
      <td>
        <input type="email" name="email" value="">
      </td>
    </tr>
    <tr>
      <th>パスワード</th>
      <td>
        <input type="password" name="password" value="">
      </td>
    </tr>
    <tr>
      <td>
        <button>ログイン</button>
      </td>
    </tr>
  </table>
</form>

<p>新規登録は<a href="{{route('admin.register')}}">こちら</a></p>

@endsection
