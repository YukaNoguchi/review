@extends('admin.layouts.app')

@section('content')

<h2>アカウント名変更</h2>
@error('name')
<p>{{ $message }}</p>
@enderror
<form action="{{ route('admin.name.update') }}" method="POST">
  @method('PUT')
  @csrf
  <input type="text" name="name">
  <input type="submit" value="更新">
</form>

@endsection
