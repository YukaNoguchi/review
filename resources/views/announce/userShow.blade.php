@extends('user.layouts.app')

@section('content')

<p>運営より</p>
<p>{{ $announce->title }}</p>
<p>{{ $announce->created_at->format('Y.m.d') }}</p>
<p>{!! nl2br(e($announce->contents)) !!}</p>

@endsection
