@extends('layouts.front')

@section('title', 'Edit client')

@section('content')
<div class="w-full py-8 flex justify-center">
    <div class="block p-6 rounded-lg shadow-lg bg-white w-2/3">
        <h1>Update client</h1>
        <form method="POST" action="{{ route('admin.clients.update', ['id' => $client->id]) }}">
            @csrf
            @method('patch')
            <div class="form-group mb-6">
                <label for="name" class="form-label inline-block mb-2 text-gray-700">
                    Name
                </label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Enter client name"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    value="{{ $client->name }}"
                >
            </div>
            <div class="w-full flex items-end justify-end space-x-8">
                <a
                    href="/admin/clients"
                    title="Return to index"
                    class="inline-block px-6 py-2 leading-tight font-bold focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="inline-block px-6 py-2 border-2 border-blue-600 bg-blue-600 border-blue-600 text-white leading-tight font-bold rounded hover:bg-blue-500 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                >
                    Update
                </button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1>Items</h1>
            @foreach ($client->items as $item)
                @foreach ($item->translations as $attribute => $translations)
                    <h2>{{ $attribute }}</h2>
                    @foreach ($translations as $language => $translation)
                        <h3>{{ $language }}</h3>
                        <div class="form-group mb-6">
                            <input
                                name="items[{{ $item->id }}][{{ $attribute }}][{{ $language }}]"
                                type="text"
                                placeholder="Enter {{ $attribute }} in {{ $language }}"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                value="{{ $translation }}"
                            >
                        </div>
                    @endforeach
                @endforeach
                <hr>
            @endforeach
        </form>
    </div>
</div>
@endsection
