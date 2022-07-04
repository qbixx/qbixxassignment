@extends('layouts.front')

@section('title', 'Welcome')

@section('content')
    <section>
        <div class="rounded-lg bg-dark m-4 py-8">
            <div class="text-white text-center py-8 md:py-12 lg:py-24">
                <h2 class="text-xl md:text-3xl lg:text-5xl font-semibold leading-tight">
                    Welcome to the Qbixx test!
                </h2>

                <h3 class="text-lg md:text-xl lg:text-2xl leading-tight my-6">
                    We wish you good luck!
                </h3>

                <a
                href="{{ route(RoutesEnum::ADMIN_INDEX_CLIENTS) }}" 
                class="inline-flex items-center px-8 py-2 border border-transparent font-bold rounded-full text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" 
                >
                To admin panel
            </a>
            </div>

            <div class="w-2/3 md:w-1/2 mx-auto -mb-8">
                <img src="{{ asset('images/header-qbixx.png') }}">
            </div>
        </div>

        <div class="flex space-x-4 m-4">
            <a href="https://www.qbixx.nl/" class="text-gray-700 hover:underline">
                Website
            </a>
            
            <a href="https://github.com/qbixx" class="text-gray-700 hover:underline">
                Github
            </a>
        </div>
    </section>
@endsection
