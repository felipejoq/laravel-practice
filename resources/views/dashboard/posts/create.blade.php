@extends('layouts.main')

@section('title', isset($post) ? 'Edit Post' : 'Create Post')

@section('content')
    <main class="flex flex-col items-center">
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
            <!-- show the error message if the title field has an error -->
            @if($errors->has('title'))
                <small class="text-red-500">{{ $errors->first('title') }}</small>
            @endif

            <label for="slug">Slug</label>
            <input class="border-2" type="text" name="slug" id="slug" value="{{ old('slug', $post->slug ?? '') }}">
            <!-- show the error message if the slug field has an error -->
            @if($errors->has('slug'))
                <small class="text-red-500">{{ $errors->first('slug') }}</small>
            @endif

            <label>URL Imagen</label>
            <input class="border-2" type="text" name="image" id="image" value="{{ old('image', $post->image ?? '') }}">
            <!-- show the error message if the image field has an error -->
            @if($errors->has('image'))
                <small class="text-red-500">{{ $errors->first('image') }}</small>
            @endif

            <label>Resumen</label>
            <input class="border-2" type="text" name="excerpt" id="excerpt"
                   value="{{ old('excerpt', $post->excerpt ?? '') }}" required>
            <!-- show the error message if the excerpt field has an error -->
            @if($errors->has('excerpt'))
                <small class="text-red-500">{{ $errors->first('excerpt') }}</small>
            @endif

            <label for="content">Contenido</label>
            <textarea class="border-2" name="content" id="content" cols="30" rows="10" required>{{ old('content', $post->content ?? '') }}</textarea>
            <!-- show the error message if the content field has an error -->
            @if($errors->has('content'))
                <small class="text-red-500">{{ $errors->first('content') }}</small>
            @endif

            <label for="category_id">Categoría</label>
            <select class="border-2" name="category_id" id="category_id" required>
                @foreach($categories as $id => $name)
                    <option value="{{ $id }}" {{ (old('category_id') ?? $post->category_id ?? '') == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            <!-- show the error message if the category_id field has an error -->
            @if($errors->has('category_id'))
                <small class="text-red-500">{{ $errors->first('category_id') }}</small>
            @endif

            <label for="status">Estado</label>
            <select class="border-2" name="status" id="status">
                <option value="draft" {{ (old('status') ?? $post->status ?? '') == 'draft' ? 'selected' : '' }}>
                    Borrador
                </option>
                <option value="published" {{ (old('status') ?? $post->status ?? '') == 'published' ? 'selected' : '' }}>
                    Publicado
                </option>
            </select>
            <!-- show the error message if the status field has an error -->
            @if($errors->has('status'))
                <small class="text-red-500">{{ $errors->first('status') }}</small>
            @endif

            <button class="px-4 py-2 bg-green-100 hover:bg-green-600 hover:text-white" type="submit">
                {{ isset($post) ? 'Actualizar' : 'Crear' }}
            </button>

            <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-red-100 hover:bg-red-600 hover:text-white text-center">
                Cancelar
            </a>
        </form>
    </main>
@endsection
