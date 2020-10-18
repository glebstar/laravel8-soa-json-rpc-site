@extends('layouts.main')

@section('content')
    <h1>Page</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <p>UID: {{ $data['page_uid'] }}</p>
    <p>Title: {{ $data['title'] }}</p>
    <p>Body: {{ $data['body'] }}</p>
    <p><a href="{{ route('index') }}">Main page</a></p>
@endsection
