@extends('user.layouts.app')
@section('content')

<form action="{{ route('users.search') }}" method="GET">
  @csrf
  <p><input type="text" name="keyword" placeholder="商品名／ブランド"></p>
  <p><input type="submit" value="検索"></p>
</form>

<ul>
  @foreach ($categories as $category)
  <li>
    <a href="{{route('users.search', ['category' => $category->id]) }}">{{ $category->name }}</a>
  </li>
  @endforeach
</ul>

@foreach ($products as $product)
<div class="product-container">
  <div class="product-box">
    @if($product->images)
    <img src="{{ asset('storage/product_image/' . $product->images) }}" alt="product_image">
    @else
    <img src="{{ asset('images/no_image.png') }}" alt="no_image">
    @endif
    <p><a href="{{ route('users.products.show', ['product' => $product->id]) }}">{{ $product->name }}</p>
    <p>{{ $product->brand }}</p>
  </div>
</div>
@endforeach


@endsection