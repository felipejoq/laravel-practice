@extends('layouts.main')

@section('title', isset($post) ? 'Edit Post' : 'Create Post')

@section('content')
    <main class="flex flex-col items-center">
        @include('dashboard.fragment._errors-form')
        <h1>{{ isset($post) ? 'Editar post' : 'Crear un post' }}</h1>
        <form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" method="post"
              class="flex flex-col gap-4 min-w-96">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif
            <label for="title">Título</label>
            <input class="border-2" type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}"
                   required>
            <label>URL Imagen</label>
            <input class="border-2" type="text" name="image" id="image" value="{{ old('image', $post->image ?? '') }}">
            <label>Resumen</label>
            <input class="border-2" type="text" name="excerpt" id="excerpt"
                   value="{{ old('excerpt', $post->excerpt ?? '') }}" required>
            <label for="content">Contenido</label>
            <textarea class="border-2" name="content" id="content" cols="30" rows="10" required>
                {{ old('content', $post->content ?? '') }}
            </textarea>
            <label for="category_id">Categoría</label>
            <select class="border-2" name="category_id" id="category_id" required>
                @foreach($categories as $id => $name)
                    <option value="{{ $id }}" {{ (old('category_id') ?? $post->category_id ?? '') == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            <label for="status">Estado</label>
            <select class="border-2" name="status" id="status">
                <option value="draft" {{ (old('status') ?? $post->status ?? '') == 'draft' ? 'selected' : '' }}>
                    Borrador
                </option>
                <option value="published" {{ (old('status') ?? $post->status ?? '') == 'published' ? 'selected' : '' }}>
                    Publicado
                </option>
            </select>
            <button class="px-4 py-2 bg-green-50 hover:bg-green-600 hover:text-white"
                    type="submit">{{ isset($post) ? 'Actualizar post' : 'Crear post' }}</button>
        </form>
    </main>
@endsection
