@extends('user.layouts.app')

@section('content')

<div class="container">
  @foreach ($slides as $slide)
  <div class="slide-box">
    @if(file_exists('storage/slide/' . $slide->image_path))
    <img src="{{ asset('storage/slide/' . $slide->image_path) }}" alt="{{ $slide->title }}">
    @else
    <img src="{{ asset('storage/slide/no_slide.png') }}" alt="no_slide">
    @endif
  </div>
  @endforeach
  <span class="slide-button prev"></span>
  <span class="slide-button next"></span>
</div>

@foreach ($products as $product)
<div class="product-container">
  <div class="product-box">
    @if($product->images)
    <img src="{{ asset('storage/product_image/' . $product->images) }}" alt="product_image">
    @else
    <img src="{{ asset('images/no_image.png') }}" alt="no_image">
    @endif
    <p>{{ $product->name }}</p>
    <p>{{ $product->brand }}</p>
  </div>
</div>
@endforeach

@endsection