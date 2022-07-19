@extends('user.layouts.app')

@section('content')

<p>お知らせ</p>
@foreach ($announces as $announce)
<a href="{{ route('users.announces.show', ['announce' => $announce]) }}">
  <p>運営より</p>
  <p>{{ $announce->title }}</p>
  <p>{{ $announce->created_at->format('Y.m.d') }}</p>
</a>
@endforeach

{{ $announces->links() }}

@endsection
