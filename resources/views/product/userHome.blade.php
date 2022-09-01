@extends('user.layouts.app')

@section('content')

<!-- <div class="swiper-container">
  @foreach ($slides as $slide)
  <div class="swiper-wrapper">
    @if(file_exists('storage/slide/' . $slide->image_path))
    <div class="swiper-slide"><img src="{{ asset('/storage/slide/' . $slide->image_path) }}" alt="{{ $slide->title }}"></div>
    @else
    <div class="swiper-slide"><img class="swiper-slide"src="{{ asset('images/no_image.png') }}" alt="no_slide"></div>
    @endif
  </div>
  @endforeach

  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div> -->

<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide">
      <img src="./images/logo.png">
    </div>
    <div class="swiper-slide">
      <img src="./images/home.png">
    </div>
    <div class="swiper-slide">
     <img src="./images/ranking.png">
   </div>
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  <!-- <div class="swiper-scrollbar"></div> -->
</div>

<script type="module">
  const swiper = new Swiper('.swiper', {
  // Optional parameters
  // direction: 'vertical',
  loop: true,

  // If we need pagination
  pagination: {
  el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  // scrollbar: {
  //   el: '.swiper-scrollbar',
  // },
});
</script>

<style type="text/css">
.swiper {
width: 1000px;
height: 300px;
}
/* .swiper-slide{
  displey: flex;
  align-items: center;
} */
</style>

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
