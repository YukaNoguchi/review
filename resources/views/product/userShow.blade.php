@extends('user.layouts.app')

@section('content')

@if($product->images)
<img src="{{ asset('storage/product_image/' . $product->images) }}" alt="商品画像">
@else
<img src="{{ asset('images/no_image.png') }}" alt="no_image">
@endif
<p>{{ $product->name }}</p>
<p>{{ $product->brand }}</p>
<p>{{ $product->category1->name }}</p>
<p>{{ $product->category2->name }}</p>
<p>{{ $product->price }}</p>
<p>商品情報</p>
<p>{{ $product->detail }}</p>

<div>
  <a href="" class="modalOpen" data-target="modal">
    <p>口コミを書く</p>
  </a>
  @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif
</div>

<div class="modal js-modal" id="modal">
  <div class="modal-inner">
    <div class="inner-content">
      <p>口コミ投稿</p>
      @if($product->images)
      <img src="{{ asset('storage/product_image/' . $product->images) }}" alt="商品画像">
      @else
      <img src="{{ asset('images/no_image.png') }}" alt="no_image">
      @endif
      <p>{{ $product->name }}/{{ $product->brand }}</p>

      <form action="{{ route('users.products.post', ['product' => $product->id]) }}" method="POST">
        @csrf
        <label>評価
          <select name="point">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </label>
        <input type='text' name='comment' placeholder='内容を入力してください'>
        <button type='submit'>投稿</button>
      </form>
      <p class="modalClose">閉じる</p>

    </div>
  </div>
</div>


@if($product->isLikedBy(Auth::user()))
<form action="{{ route('users.products.unfavorite', ['product' => $product]) }}" method="post">
  @csrf
  @method('DELETE')
  <input type="submit" value="お気に入り済み">
</form>
@else
<form action="{{ route('users.products.favorite', ['product' => $product]) }}" method="post">
  @csrf
  <input type="submit" value="お気に入り">
</form>
@endif

<p>以下口コミ一覧</p>
<table>
  @foreach ($product->posts as $post)
  <tr>
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
        <button type="submit"><img src="{{ asset('images/liked.png') }}" alt="いいねをはずす" class="like-star"></button>
      </form>
      @else
      <form action="{{ route('users.posts.like', ['post' => $post->id]) }}" method="post">
        @csrf
        <button type="submit"><img src="{{ asset('images/unlike.png') }}" alt="いいね" class="like-star"></button>
      </form>
      @endif
    </td>
  </tr>
  @endforeach
</table>

@endsection
