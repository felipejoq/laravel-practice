@extends('layouts.main')

@section('title', $post->title)

@section('content')
    <main class="mb-10 flex flex-col items-center max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg" style="max-width: 700px;">
        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-t-lg"/>
        <div class="p-6">
            <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
            <p class="text-lg text-gray-700 mb-4">{{ $post->excerpt }}</p>
            <div class="prose max-w-none mb-4">
                {!! $post->content !!}
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                <span class="text-sm text-gray-500">{{ $post->category->name }}</span>
                <span class="text-sm text-gray-500">{{ $post->status }}</span>
            </div>
        </div>
    </main>
@endsection
