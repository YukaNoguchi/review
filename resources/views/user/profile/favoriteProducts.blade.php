@extends('user.layouts.app')

@section('content')

@include('user.profile.layout')

<div id="tab04" class="tab favorite-products">
  <h2>お気に入り商品</h2>
  <div>
    @foreach ($favoriteProducts as $product)
    <div class="product-container">
      <div class="product-box">
        <p>
          @if($product->images)
          <img src="{{ asset('storage/product_image/' . $product->images) }}" alt="product_image">
          @else
          <img src="{{ asset('images/no_image.png') }}" alt="no_image">
          @endif
        </p>
        <p>{{ $product->name }}</p>
        <p>{{ $product->brand }}</p>
      </div>
    </div>
    @endforeach
  </div>
  {{ $favoriteProducts->links() }}
</div>

@endsection
