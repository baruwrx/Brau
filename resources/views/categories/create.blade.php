@extends('layout')

@section('content')
<h1>Crear Categoría</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="name">Nombre de la Categoría:</label>
    <input type="text" name="name" required>
    <button type="submit">Guardar</button>
</form>
@endsection
