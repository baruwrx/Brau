@extends('layout')

@section('content')
    <h1>Agregar Nuevo Vape</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vapes.store') }}" method="POST">
        @csrf
        <label for="name">Nombre del Vape:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        
        <label for="price">Precio:</label>
        <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
        
        <label for="stock">Cantidad en Stock:</label>
        <input type="number" id="stock" name="stock" value="{{ old('stock') }}" required>

        <button type="submit">Agregar</button>
    </form>
@endsection
