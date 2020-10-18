@extends('layouts.main')

@section('content')
    <h1>Create Page</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('store') }}">
        @csrf
        <input type="hidden" value="{{ uniqid() }}" name="page_uid">
        <input type="text" placeholder="Title" name="title"><br>
        <textarea placeholder="Body" name="body"></textarea><br>
        <button type="submit">Create</button>
    </form>
    <p><a href="{{ route('index') }}">Main page</a></p>
@endsection
