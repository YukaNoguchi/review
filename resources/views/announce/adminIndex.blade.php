@extends('admin.layouts.app')

@section('content')

<h2>ユーザー通知管理</h2>
<a href="{{ route('admin.announces.create') }}">新規登録</a>
@foreach ($announces as $announce)
<p>{{ $announce->created_at->format('Y.m.d') }}</p>
<p>{{ $announce->title }}</p>
<a href="{{ route('admin.announces.edit', ['announce' => $announce->id]) }}">編集</a>
@endforeach
{{ $announces->links() }}

@endsection
