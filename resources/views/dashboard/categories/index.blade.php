@extends('layouts.main')

@section('title', 'Categories List')

@section('content')
    <main class="flex flex-col gap-4 max-w-screen-lg mx-auto">
        <h1>Listado de categorías</h1>

        <nav>
            <ul class="flex gap-4 list-none">
                <li class="bg-green-100 hover:bg-green-600 hover:text-white px-4 py-2">
                    <a href="{{ route('categories.create') }}">
                        Crear categoría
                    </a>
                </li>
            </ul>
        </nav>

        @include('dashboard.fragment._messages-form')
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="border p-2">#Id</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Slug</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr class="hover:bg-gray-100">
                    <td class="border" data-label="Número">{{ $category->id }}</td>
                    <td class="border" data-label="Título">
                        {{ $category->name }}
                    </td>
                    <td class="border" data-label="Resumen">
                        {{ $category->slug }}
                    </td>
                    <td class="border" data-label="Acciones">
                        <div class="flex justify-center">
                            <a href="{{ route('categories.edit', $category) }}"
                               class="bg-blue-100 hover:bg-blue-600 hover:text-white px-4 py-2">
                                Editar
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="post" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoria?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-100 hover:bg-red-600 hover:text-white px-4 py-2" type="submit">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="border p-2" colspan="7">No hay categorías</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <!-- Pagination links -->
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </main>
@endsection
