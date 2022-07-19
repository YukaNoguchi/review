@extends('admin.layouts.app')

@section('content')

<p>運営より</p>
<p>{{ $announce['title'] }}</p>
<p>{{ \Carbon\Carbon::now()->format("Y.m.d") }}</p>
<p>{!! nl2br(e($announce['contents'])) !!}</p>
<form action="{{ route('admin.announces.store') }}" method="POST">
  @csrf
  <input type="hidden" name="title" value="{{ $announce['title'] }}">
  <input type="hidden" name="contents" value="{{ $announce['contents'] }}">
  <button type="submit" name="action" value="back">修正する</button>
  <input type="submit" value="登録">
</form>
@endsection
