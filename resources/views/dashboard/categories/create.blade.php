@extends('layouts.main')

@section('title', isset($category) ? 'Edit Category' : 'Create Category')

@section('content')
    <main class="flex flex-col items-center">
        <h1>{{ isset($post) ? 'Edit category' : 'Add category' }}</h1>
        <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" method="post"
              class="flex flex-col gap-4 min-w-96">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif
            <label for="title">Name</label>
            <input class="border-2" type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}"
                   required>
            <!-- show the error message if the title field has an error -->
            @if($errors->has('name'))
                <small class="text-red-500">{{ $errors->first('name') }}</small>
            @endif

            <label for="slug">Slug</label>
            <input class="border-2" type="text" name="slug" id="slug" value="{{ old('slug', $category->slug ?? '') }}">
            <!-- show the error message if the slug field has an error -->
            @if($errors->has('slug'))
                <small class="text-red-500">{{ $errors->first('slug') }}</small>
            @endif

            <button class="px-4 py-2 bg-green-100 hover:bg-green-600 hover:text-white" type="submit">
                {{ isset($category) ? 'Actualizar' : 'Crear' }}
            </button>

            <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-red-100 hover:bg-red-600 hover:text-white text-center">
                Cancelar
            </a>
        </form>
    </main>
@endsection
