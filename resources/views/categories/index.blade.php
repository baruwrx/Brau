@extends('layout')

@section('content')
<h1>Categorías</h1>
<a href="{{ route('categories.create') }}" class="btn">Crear Nueva Categoría</a>

<table>
    <tr>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{ $category->name }}</td>
        <td>
            <a href="{{ route('categories.edit', $category) }}">Editar</a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
