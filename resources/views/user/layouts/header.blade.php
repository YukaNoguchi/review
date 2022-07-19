<header>
  <div class="header-top">
    <a href="{{ route('users.home') }}" class="header-logo"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
    <a href="{{ route('users.mypage') }}" class="header-user-icon">
      @if(Auth::user()->icon)
      <img src="{{ asset('storage/user_icon/' . Auth::user()->icon) }}" alt="user_icon">
      @else
      <img src="{{ asset('images/default_icon.png') }}" alt="default_icon">
      @endif
    </a>
  </div>
  <nav class="gnavi">
    <ul>
      <li><a href="{{ route('users.home') }}"><img src="{{ asset('images/home.png') }}" alt="home">HOME</a></li>
      <li><a href="{{ route('users.search') }}"><img src="{{ asset('images/search.png') }}" alt="search">検索</a></li>
      <li><a href="{{ route('users.posts.index') }}"><img src="{{ asset('images/review.png') }}" alt="review">口コミ</a></li>
      <li><a href="{{ route('users.blogs.index') }}"><img src="{{ asset('images/blog.png') }}" alt="blog">ブログ</a></li>
      <li><a href="{{ route('users.products.allRanking') }}"><img src="{{ asset('images/ranking.png') }}" alt="ranking">ランキング</a></li>
      <li><a href="{{ route('users.follows.index') }}"><img src="{{ asset('images/follow.png') }}" alt="follow">フォロー</a></li>
      <li><a href="{{ route('users.mypage') }}"><img src="{{ asset('images/mypage.png') }}" alt="mypage">Myページ</a></li>
      <li><a href="{{ route('users.announces.index') }}"><img src="{{ asset('images/announce.png') }}" alt="announce">お知らせ</a></li>
    </ul>
  </nav>
</header>
