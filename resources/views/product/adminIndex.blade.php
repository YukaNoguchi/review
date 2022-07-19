@extends('admin.layouts.app')

@section('content')
<h2>商品管理</h2>
<a href="{{ route('admin.home') }}">＜戻る</a>
<form action="" method="">
  <input type="text" name="" placeholder="商品名／ブランド名">
  <input type="image" src="{{ asset('images/search.png') }}" alt="検索">
</form>

<table>
  <tr>
    <th>画像</th>
    <th>商品名</th>
    <th>値段</th>
    <th>カテゴリ</th>
    <th>登録日</th>
    <th>更新日</th>
    <th>編集</th>
    <th>評価</th>
    <th>口コミ</th>
  </tr>
  @foreach($products as $product)
  <tr>
    @if($product->images)
    <th>
      <img src="{{ asset('storage/product_image/' . $product->images) }}" alt="商品画像">
    </th>
    @else
    <th>
      <img src="{{ asset('images/no_image.png') }}" alt="no_image">
    </th>
    @endif
    <th>{{ $product->name }}</th>
    <th>{{ $product->price }}</th>
    <th>
      <p>{{ $product->category1->name . '/' }}</p>
      @if($product->category_2 === null)
      <p>カテゴリなし</p>
      @else
      <p>{{ $product->category2->name }}</p>
      @endif
    </th>
    <th>{{ $product->created_at->format('Y/m/d') }}</th>
    <th>{{ $product->updated_at->format('Y/m/d') }}</th>
    <th><a href="{{ route('admin.products.edit', ['product' => $product->id]) }}">編集</a></th>
    <th>{{ number_format($product->posts->avg('point'), 1) }}</th>
    <th>{{ $product->posts->count() }}</th>
  </tr>
  @endforeach
</table>
{{ $products->links('vendor.pagination.semantic-ui') }}
@endsection
