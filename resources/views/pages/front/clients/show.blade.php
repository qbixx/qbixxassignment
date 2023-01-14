@extends('layouts.front')

@section('title', 'Show client')

@section('content')
    <div>
        Choose language
        @foreach ($languages as $language)
            <a
                style="{{ $selectedLanguage === $language ? "text-decoration: underline;" : '' }}"
                href="{{ route('front.clients.show', [$language, $client->id]) }}"
            >
                {{ $language }}
            </a>
        @endforeach
    </div>
    <h2>{{ $client->name }}</h2>
    <hr>
    @foreach ($client->items as $item)
        <h2>{{ $item->title }}</h2>
        <h2>{{ $item->paragraph }}</h2>
        <h2>{{ $item->type }}</h2>
        <hr>
    @endforeach
@endsection