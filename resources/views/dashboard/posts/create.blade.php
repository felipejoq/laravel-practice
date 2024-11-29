@extends('layouts.main')

@section('title', 'Create Post')

@section('content')
    <main class="flex flex-col items-center">
        @include('dashboard.fragment._errors-form')
        <h1>Crear un post</h1>
        <form action="{{ route('posts.store') }}" method="post" class="flex flex-col gap-4 min-w-96">
            @csrf
            <p>
                <label for="title">Título</label>
                <input class="border-2" type="text" name="title" id="title" value="{{ old('title') }}" required>
            </p>
            <p>
                <label>URL Imagen</label>
                <input class="border-2" type="text" name="image" id="image" value="{{ old('image') }}">
            </p>
            <p>
                <label>Resumen</label>
                <input class="border-2" type="text" name="excerpt" id="excerpt" value="{{ old('excerpt') }}" required>
            </p>
            <p>
                <label for="content">Contenido</label>
                <textarea class="border-2" name="content" id="content" cols="30" rows="10" required>{{ old('content') }}</textarea>
            </p>
            <p>
                <label for="category_id">Categoría</label>
                <select class="border-2" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $name)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="status">Estado</label>
                <select class="border-2" name="status" id="status">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Borrador</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Publicado</option>
                </select>
            </p>
            <button class="px-4 py-2 bg-green-50 hover:bg-green-600 hover:text-white" type="submit">Crear post</button>
        </form>
    </main>
@endsection
