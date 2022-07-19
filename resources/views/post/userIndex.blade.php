@extends('user.layouts.app')

@section('content')

<p>今日の新着口コミ</p>

<table>
  @foreach($posts as $post)
  <tr>
    <td><a href="{{ route('users.profiles.show',  ['user' => $post->user->id])}}">{{ $post->user->name }}</td>
    <td>{{ $post->point }}</td>
    <td>
      @if($post->user->icon)
      <img src="{{ asset('storage/user_icon/' . $post->user->icon) }}" alt="ユーザーアイコン">
      @else
      <img src="{{ asset('images/default_icon.png') }}" alt="default_icon">
      @endif
    </td>
    <td>{{ $post->user->name }}</td>
    <td>評価：{{ $post->point }}</td>
    <td>{{ $post->comment }}</td>
    <td>
      @if($post->isLikedBy(Auth::user()))
      <form action="{{ route('users.posts.unlike', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">
          <img src="{{ asset('images/liked.png') }}" alt="いいねをはずす" class="like-star">
        </button>
      </form>
      @else
      <form action="{{ route('users.posts.like', ['post' => $post->id]) }}" method="post">
        @csrf
        <button type="submit">
          <img src="{{ asset('images/unlike.png') }}" alt="いいね" class="like-star">
        </button>
      </form>
      @endif
    </td>
    <td>
      @if($post->product->images)
      <img src="{{ asset('storage/product_image/' . $post->product->images) }}" alt="product_image">
      @else
      <img src="{{ asset('images/no_image.png') }}" alt="no_image">
      @endif
    </td>
    <td>{{ $post->product->name }}</td>
    <td>{{ $post->product->brand }}</td>
  </tr>
  @endforeach
</table>

{{ $posts->links() }}

@endsection