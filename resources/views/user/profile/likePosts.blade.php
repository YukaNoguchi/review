@extends('user.layouts.app')

@section('content')

@include('user.profile.layout')

<div id="tab03" class="tab like-posts">
  <h2>お気に入り口コミ</h2>
  <table>
    @foreach($likePosts as $post)
    <tr>
      <td>{{ $post->user->name }}</td>
      <td>{{ $post->point }}</td>
      <td>{{ $post->comment }}</td>
      <td>
        @if($post->isLikedBy(Auth::user()))
        <form action="{{ route('users.posts.unlike', ['post' => $post->id]) }}" method="post">
          @csrf
          @method('DELETE')
          <input type="submit" value="いいねをはずす">
        </form>
        @else
        <form action="{{ route('users.posts.like', ['post' => $post->id]) }}" method="post">
          @csrf
          <input type="hidden" value="{{ $post->id }}" name="post">
          <input type="submit" value="いいね">
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
  {{ $likePosts->links() }}
</div>

@endsection
