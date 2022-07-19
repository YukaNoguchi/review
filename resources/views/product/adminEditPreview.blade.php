@extends('admin.layouts.app')

@section('content')

<h2>プレビュー</h2>
@if($product_image->images)
<img src="{{ asset('storage/product_image/' . $product_image->images) }}" alt="商品画像">
@else
<img src="{{ asset('images/no_image.png') }}" alt="no_image">
@endif
<p>{{ $products['name'] }}</p>
<p>{{ $products['brand'] }}</p>
<p>{{ $products['price'] }}</p>
<p>商品情報</p>
<p>{{ $products['detail'] }}</p>
<form action="{{ route('admin.products.update', $products['id']) }}" method="post">
  <button type="button" onclick="history.back()">{{ __('修正する') }}</button>
  <button type="submit">{{ __('登録') }}</button>
<input type="hidden" name="name" value="{{ $products['name'] }}">
<input type="hidden" name="brand" value="{{ $products['brand'] }}">
<input type="hidden" name="price" value="{{ $products['price'] }}">
<input type="hidden" name="detail" value="{{ $products['detail'] }}">
<input type="hidden" name="category" value="{{ $products['category'] }}">
<input type="hidden" name="category_2" value="{{ $products['category_2'] }}">
<input type="hidden" name="images" value="{{ $product_image['images'] }}">
@csrf
</form>

@endsection
