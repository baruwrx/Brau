@extends('layout')

@section('content')
    <div class="container">
        <h1 class="neon-title">Lista de Vapes</h1>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <a href="{{ route('vapes.create') }}" class="btn neon-btn">Crear Nuevo Vape</a>

        <table class="neon-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vapes as $vape)
                    <tr>
                        <td>{{ $vape->id }}</td>
                        <td>{{ $vape->name }}</td>
                        <td>{{ $vape->description }}</td>
                        <td>{{ $vape->price }}</td>
                        <td>{{ $vape->stock }}</td>
                        <td>
                            <a href="{{ route('vapes.edit', $vape) }}" class="btn neon-btn">Editar</a>
                            <form action="{{ route('vapes.destroy', $vape) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn neon-btn">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $vapes->links() }}
        </div>
    </div>
@endsection

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

