@extends('layouts.front')

@section('title', 'Show client')

@section('content')
    <form action="{{ route('front.set-locale') }}" method="POST">
        @csrf
        <select name="language">
            @foreach ($languages as $language)
                <option
                    {{ session('locale') === $language->value ? "selected" : '' }}
                    value="{{ $language->value }}"
                >
                    {{ $language->name }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Switch">
    </form>
    <h2>{{ $client->name }}</h2>
    <hr>
    @foreach ($client->items as $item)
        <h2>{{ $item->title }}</h2>
        <h2>{{ $item->paragraph }}</h2>
        <h2>{{ $item->type }}</h2>
        <hr>
    @endforeach
@endsection
