@extends('admin.layouts.app')

@section('content')

<h2>プレビュー</h2>

<form action="{{ route('admin.products.store') }}" method="post">
  @csrf
  @if($product->images)
  <img src="{{ asset('storage/product_image/' . $product->images) }}" alt="商品画像">
  @else
  <img src="{{ asset('images/no_image.png') }}" alt="no_image">
  @endif
  <p>{{ $product->name }}</p>
  <p>{{ $product->brand }}</p>
  <p>{{ $product->price }}</p>
  <p>商品情報</p>
  <p>{{ $product->detail }}</p>
  <p>口コミを書く</p>
  <p>この商品をお気に入り</p>

  <input type="hidden" name="product" value="{{ $product }}">

  <a href="{{ route('admin.products.create') }}">修正する</a>
  <input type="submit" value="登録">
</form>

@endsection
