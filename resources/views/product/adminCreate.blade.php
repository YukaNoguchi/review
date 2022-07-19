@extends('admin.layouts.app')

@section('content')

<h2>商品新規登録</h2>

<a href="{{ route('admin.home') }}">＜戻る</a>

<form action="{{ route('admin.products.preview') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div>
    <img src="{{ asset('images/no_image.png') }}" alt="デフォルトの商品画像">
    <input type="file" name="images">
  </div>
  @error('images')
  <p>{{ $message }}</p>
  @enderror
  <div>
    <input type="text" name="name" placeholder="商品名 ＊必須" value="{{ isset($product->name) ? $product->name : old('name') }}">
  </div>
  @error('name')
  <p>{{ $message }}</p>
  @enderror
  <div>
    <input type="text" name="brand" placeholder="ブランド名" value="{{ isset($product->brand) ? $product->brand : old('brand') }}">
  </div>

  <p>カテゴリ選択</p>
  <div>
    <select name="category">
      <option></option>
      @foreach ($categories as $category)
      @if (isset($product->category) && $product->category == $loop->iteration)
      <option value="{{ $loop->iteration }}" selected>{{ $category->name }}</option>
      @elseif (old('category') == $loop->iteration)
      <option value="{{ $loop->iteration }}" selected>{{ $category->name }}</option>
      @else
      <option value="{{ $loop->iteration }}">{{ $category->name }}</option>
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
      @if (isset($product->category_2) && $product->category_2 == $loop->iteration)
      <option value="{{ $loop->iteration }}" selected>{{ $category->name }}</option>
      @elseif (old('category_2') == $loop->iteration)
      <option value="{{ $loop->iteration }}" selected>{{ $category->name }}</option>
      @else
      <option value="{{ $loop->iteration }}">{{ $category->name }}</option>
      @endif
      @endforeach
    </select>
    <span>(任意)</span>
  </div>

  <p>値段</p>
  <div>
    <input type="number" min="0" name="price" value="{{ isset($product->price) ? $product->price : old('price') }}">
    <span>円</span>
  </div>
  @error('price')
  <p>{{ $message }}</p>
  @enderror

  <div>
    <textarea name="detail" placeholder="商品情報入力 ＊必須">{{ isset($product->detail) ? $product->detail : old('detail') }}</textarea>
  </div>
  @error('detail')
  <p>{{ $message }}</p>
  @enderror

  <input class="send" type="submit" value="プレビュー">
</form>

@endsection
