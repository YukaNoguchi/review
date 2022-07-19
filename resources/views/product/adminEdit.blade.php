@extends('admin.layouts.app')

@section('content')

<h2>商品情報編集</h2>
<a href="{{ route('admin.products.index') }}">＜戻る</a>
<form action="{{ route('admin.products.editPreview') }}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $product->id }}">
  <div>
    @if(!empty($product->images))
    <img src="{{ asset('storage/product_image/' . $product->images) }}" alt="{{ $product->images }}">
    @else
    <img src="{{ asset('images/no_image.png') }}" alt="デフォルトの商品画像">
    @endif
    <input type="file" name="images">
  </div>
  @error('images')
  <p>{{ $message }}</p>
  @enderror
  <div>
    <input type="text" name="name" placeholder="商品名 ＊必須" value="{{ old('name', $product->name) }}">
  </div>
  @error('name')
  <p>{{ $message }}</p>
  @enderror
  <div>
    <input type="text" name="brand" placeholder="ブランド名" value="{{ old('brand', $product->brand) }}">
  </div>
  <p>カテゴリ選択</p>
  <div>
    <select name="category">
      <option></option>
      @foreach ($categories as $category)
      @if ($product->category === $category->id)
      <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
      @else
      <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endif
      @endforeach
    </select>
    <span>※必須</span>
  </div>
  @error('category')
  <p>{{ $message }}</p>
  @enderror
  <div>
    <select name="category_2">
      <option></option>
      @foreach ($categories as $category)
      @if ($product->category_2 === $category->id)
      <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
      @else
      <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endif
      @endforeach
    </select>
    <span>(任意)</span>
  </div>
  <p>値段</p>
  <div>
    <input type="number" min="0" name="price" value="{{ old('price', $product->price) }}">
    <span>円</span>
  </div>
  @error('price')
  <p>{{ $message }}</p>
  @enderror
  <div>
    <input type="textarea" name="detail" placeholder="商品情報入力 ＊必須" value="{{ old('detail', $product->detail) }}">
  </div>
  @error('detail')
  <p>{{ $message }}</p>
  @enderror
  <input type="submit" value="プレビュー">
</form>
<form action="{{ route('admin.products.delete', ['product' => $product->id]) }}" method="post">
  @csrf
  <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？")'>
</form>

@endsection