@extends('layout')

@section('content')
<h1>Editar Categoría</h1>

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Nombre de la Categoría:</label>
    <input type="text" name="name" value="{{ $category->name }}" required>
    <button type="submit">Actualizar</button>
</form>
@endsection
