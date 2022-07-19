@extends('user.layouts.app')
@section('content')
<div>
  <div>ユーザー名:{{ $user->name }}</div>
  <div>自己紹介{{ $user->bio }}</div>
  <a href="{{ route('users.profile.edit') }}">プロフィール編集</a>
  <div class="menu">
    <label for="menu_bar">設定</label>
    <input type="checkbox" id="menu_bar" />
    <ul id="links">
      <li><a href="{{ route('users.email.edit') }}">メールアドレス変更</a></li>
      <li><a href="{{ route('users.password.edit') }}">パスワード変更</a></li>
      @if(Auth::check())
      <li><input type="hidden" name="name" value="{{Auth::user()->name}}">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('frm-logout').submit();">ログアウト</a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST">
          @csrf
        </form>
      </li>
      @else
      <li>
        <a href="{{route('login')}}"><i class="fa fa-user"></i>Login</a>
      </li>
      @endif
    </ul>
  </div>
  <div>
    <a href="{{ route('users.follows.followList', ['user' => $user->id]) }}">
      <p>フォロー{{ $user->follows->count() }}人</p>
    </a>
  </div>
  <div>
    <a href="{{ route('users.follows.followerList', ['user' => $user->id]) }}">
      <p>フォロワー{{ $user->followers->count() }}人</p>
    </a>
  </div>

  <!-- メニューバー -->
  <nav>
    <ul>
      <li data-target="tab01"><a href="{{ route('users.profiles.show', ['user' => $user->id]) }}">口コミ</a></li>
      <li data-target="tab02"><a href="{{ route('users.profiles.show', ['user' => $user->id, 'tab' => 1]) }}">ブログ</a></li>
      <li data-target="tab03"><a href="{{ route('users.profiles.show', ['user' => $user->id, 'tab' => 2]) }}">お気に入り口コミ</a></li>
      <li data-target="tab04"><a href="{{ route('users.profiles.show', ['user' => $user->id, 'tab' => 3]) }}">お気に入り商品</a></li>
    </ul>
  </nav>
  <div><a href="{{ route('users.blogs.create') }}">ブログを書く</div>

  <!-- 口コミ一覧 -->
  @foreach($user->posts as $post)

  <table>
    <tr>
      <td>
        @if($post->user->icon)
        <img src="{{ asset('storage/user_icon/' . $post->user->icon) }}" alt="ユーザーアイコン">
        @else
        <img src="{{ asset('images/default_icon.png') }}" alt="default_icon">
        @endif
      </td>
      <td><a href="{{ route('users.profile.edit') }}">プロフィール編集</a></td>
      <td><a href="/mypage/{{ $user->id }}/delete" onclick="return confirm('本当に削除しますか？')">削除</a></td>
      <td>ユーザー名:{{ $post->user->name }}</td>
      <td>評価{{ $post->point }}</td>
      <td>イメージ{{ $post->images }}</td>
      <td>商品名／ブランド{{ $post->brand }}</td>
    </tr>
  </table>
  @endforeach
</div>
@endsection