@extends('admin.layouts.app')

@section('content')

<ul>
  <li><a href="{{ route('admin.products.create') }}">商品登録</a></li>
  <li><a href="{{ route('admin.products.index') }}">商品管理</a></li>
  <li><a href="{{ route('admin.slides.create') }}">広告登録</a></li>
  <li><a href="{{ route('admin.slides.index') }}">広告管理</a></li>
  <li><a href="{{ route('admin.announces.index') }}">通知管理</a></li>
  <li><a href="{{ route('admin.edit') }}">アカウント管理</a></li>
</ul>

@endsection