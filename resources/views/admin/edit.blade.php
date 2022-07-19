@extends('admin.layouts.app')

@section('content')

<h2>アカウント編集</h2>
<ul>
  <li><a href="{{ route('admin.name.edit') }}">登録名変更</a></li>
  <li><a href="{{ route('admin.email.edit') }}">メールアドレス変更</a></li>
  <li><a href="{{ route('admin.password.edit') }}">パスワード変更</a></li>
  <li>
    <form action="{{ route('admin.logout') }}" method="POST">
      @csrf
      <button>ログアウト</button>
    </form>
  </li>
</ul>

@endsection
