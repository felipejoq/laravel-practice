@extends('layouts.main')

@section('title', 'List Posts')

@push('styles')
    <style>
        .responsive-table {
            width: 100%;
            border-collapse: collapse;
        }

        .responsive-table th, .responsive-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .responsive-table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .responsive-table tr:hover {
            background-color: #f9f9f9;
        }

        @media screen and (max-width: 600px) {
            .responsive-table thead {
                display: none;
            }

            .responsive-table tr {
                display: block;
                margin-bottom: 10px;
            }

            .responsive-table td {
                display: block;
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            .responsive-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
@endpush

@section('content')

    <h1>Listado de posts</h1>
    <hr/>
    <a href="{{ route('posts.create') }}" class="bg-green-50 hover:bg-green-600 hover:text-white px-4 py-2">
        Crear post
    </a>

    @include('dashboard.fragment._messages-form')
    <table class="responsive-table">
        <thead>
            <tr>
                <th>#Id</th>
                <th>Thumbnail</th>
                <th>Título</th>
                <th>Resumen</th>
                <th>Categoría</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td data-label="Número">{{ $post->id }}</td>
                <td data-label="Número"><img src="{{ $post->image }}" alt="{{$post->title}}" width="50" /></td>
                <td data-label="Título">{{ $post->title }}</td>
                <td data-label="Resumen">{{ $post->excerpt }}</td>
                <td data-label="Categoría">{{ $post->category->name }}</td>
                <td data-label="Estado">{{ $post->status }}</td>
                <td data-label="Acciones">
                    <a href="{{ route('posts.edit', $post) }}"
                       class="bg-blue-50 hover:bg-blue-600 hover:text-white px-4 py-2">Editar</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-50 hover:bg-red-600 hover:text-white px-4 py-2" type="submit">Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hay posts</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
