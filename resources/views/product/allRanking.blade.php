@extends('user.layouts.app')

@section('content')

<h2>口コミランキング</h2>

<ul>
  @foreach ($categories as $category)
  <li>
    <a href="{{route('users.products.ranking', ['category' => $category->id]) }}">{!! nl2br(e($category->name)) !!}</a>
  </li>
  @endforeach
</ul>

<hr>

@foreach ($rankedProducts as $rankedProduct)
    @if($rankedProduct->images)
    <img src="{{ asset('storage/product_image/' . $rankedProduct->images) }}" alt="商品画像">
    @else
    <img src="{{ asset('images/no_image.png') }}" alt="no_image">
    @endif
    <p>{{ $rankedProduct->name }}</p>
    <p>{{ $rankedProduct->brand }}</p>
    <p>評価：{{ number_format($rankedProduct->postsPoint->first()->avg, 1) }}</p>
    <hr>
@endforeach

@endsection
