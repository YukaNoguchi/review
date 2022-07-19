@extends('admin.layouts.app')

@section('content')

<p>運営より</p>
<p>{{ $update_data['title'] }}</p>
<p>{{ $announce->created_at->format("Y.m.d") }}</p>
<p>{!! nl2br(e($update_data['contents'])) !!}</p>
<form action="{{ route('admin.announces.update') }}" method="POST">
  @csrf
  <input type="hidden" name="id" value="{{ $update_data['id'] }}">
  <input type="hidden" name="title" value="{{ $update_data['title'] }}">
  <input type="hidden" name="contents" value="{{ $update_data['contents'] }}">
  <button type="submit" name="action" value="back">修正する</button>
  <input type="submit" value="登録">
</form>
@endsection
