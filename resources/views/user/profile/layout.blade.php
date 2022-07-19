<div>
  @if($user->icon)
  <img src="{{ asset('storage/user_icon/' . $user->icon) }}" alt="ユーザーアイコン">
  @else
  <img src="{{ asset('images/default_icon.png') }}" alt="default_icon">
  @endif
</div>
<div>{{ $user->name }}</div>
<div>{{ $user->bio }}</div>

@if(in_array($user->id, array_column($followList, 'followed_id')))

<div>
  <form action="{{ route('users.unfollow', ['user' => $user->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="フォロー中">
  </form>
</div>

@else

<div>
  <form action="{{ route('users.follow', ['user' => $user->id]) }}" method="post">
    @csrf
    <input type="submit" value="フォローする">
  </form>
</div>

@endif
<a href="{{ route('users.follows.followList', ['user' => $user->id]) }}">
  <div>フォロー{{ $user->follows->count() }}人</div>
</a>
<a href="{{ route('users.follows.followerList', ['user' => $user->id]) }}">
  <div>フォロワー{{ $user->followers->count() }}人</div>
</a>
<ul class="change-tab">
  <li data-target="tab01"><a href="{{ route('users.profiles.show', ['user' => $user->id]) }}">口コミ</a></li>
  <li data-target="tab02"><a href="{{ route('users.profiles.show', ['user' => $user->id, 'tab' => 1]) }}">ブログ</a></li>
  <li data-target="tab03"><a href="{{ route('users.profiles.show', ['user' => $user->id, 'tab' => 2]) }}">お気に入り口コミ</a></li>
  <li data-target="tab04"><a href="{{ route('users.profiles.show', ['user' => $user->id, 'tab' => 3]) }}">お気に入り商品</a></li>
</ul>