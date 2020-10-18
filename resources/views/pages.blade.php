@extends('layouts.main')

@section('content')
    <h1>Pages</h1>
    <p><a href="{{ route('create') }}">Create Page</a></p>
    @foreach($data as $d)
        <p>{{ $d['title'] }} <a href="{{ route('show', $d['page_uid']) }}">show</a></p>
    @endforeach
@endsection
