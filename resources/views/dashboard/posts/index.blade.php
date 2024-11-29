@extends('layouts.main')

@section('title', 'List Posts')

@section('content')
    <main class="flex flex-col gap-4 max-w-screen-lg mx-auto">
        <h1>Listado de posts</h1>

        <nav>
            <ul class="flex gap-4 list-none">
                <li class="bg-green-50 hover:bg-green-600 hover:text-white px-4 py-2">
                    <a href="{{ route('posts.create') }}">
                        Crear post
                    </a>
                </li>
            </ul>
        </nav>

        @include('dashboard.fragment._messages-form')
        <table class="w-full border-collapse">
            <thead>
            <tr>
                <th class="border p-2">#Id</th>
                <th class="border p-2">Thumbnail</th>
                <th class="border p-2">Título</th>
                <th class="border p-2">Resumen</th>
                <th class="border p-2">Categoría</th>
                <th class="border p-2">Estado</th>
                <th class="border p-2">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($posts as $post)
                <tr class="hover:bg-gray-100">
                    <td class="border" data-label="Número">{{ $post->id }}</td>
                    <td class="border flex justify-center" data-label="Número">
                        <img src="{{ $post->image }}" alt="{{$post->title}}" width="100"/>
                    </td>
                    <td class="border" data-label="Título">
                        {{ $post->title }}
                    </td>
                    <td class="border" data-label="Resumen">
                        {{ $post->excerpt }}
                    </td>
                    <td class="border" data-label="Categoría">
                        {{ $post->category->name }}
                    </td>
                    <td class="border" data-label="Estado">
                        {{ $post->status }}
                    </td>
                    <td class="border" data-label="Acciones">
                        <div class="flex justify-center">
                            <form action="{{ route('posts.toggleStatus', $post) }}" method="post" class="inline">
                                @csrf
                                @method('PATCH')
                                <button class="bg-yellow-50 hover:bg-yellow-600 hover:text-white px-4 py-2"
                                        type="submit">
                                    {{ $post->status === 'draft' ? 'Publicar' : 'Despublicar' }}
                                </button>
                            </form>
                            <a href="{{ route('posts.edit', $post) }}"
                               class="bg-blue-50 hover:bg-blue-600 hover:text-white px-4 py-2">
                                Editar
                            </a>
                            <a href="{{ route('posts.show', $post) }}"
                               class="bg-green-50 hover:bg-green-600 hover:text-white px-4 py-2">
                                Ver
                            </a>
                            <form action="{{ route('posts.destroy', $post) }}" method="post" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-50 hover:bg-red-600 hover:text-white px-4 py-2" type="submit">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="border p-2" colspan="7">No hay posts</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <!-- Pagination links -->
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </main>
@endsection
