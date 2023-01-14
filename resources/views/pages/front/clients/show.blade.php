@extends('layouts.front')

@section('title', 'Show client')

@section('content')
    {{ $client->name }}
    @foreach ($client->items as $item)
        <h2>{{ $item->title }}</h2>
        <h2>{{ $item->paragraph }}</h2>
        <h2>{{ $item->type }}</h2>
        <hr>
    @endforeach
@endsection