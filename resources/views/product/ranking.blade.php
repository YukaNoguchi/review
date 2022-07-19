@extends('user.layouts.app')

@section('content')

<h2>口コミランキング</h2>

<ul>
  @foreach ($categories as $category)
  <li>
    <a href="{{route('users.products.ranking', ['category' => $category->id]) }}">{{ $category->name }}</a>
  </li>
  @endforeach
</ul>

<h3>{{ $categoryName }}のランキング</h3>

@foreach ($products as $product)
@if($product->images)
<img src="{{ asset('storage/product_image/' . $product->images) }}" alt="商品画像">
@else
<img src="{{ asset('images/no_image.png') }}" alt="no_image">
@endif
<p>{{ $product->name }}</p>
<p>{{ $product->brand }}</p>
<p>評価：{{ floor($product->posts->avg('point') * 100) / 100 }}</p>
@endforeach


@endsection
