@extends('layout')

@section('content')
    <h1>Edit Vape</h1>
    <form method="POST" action="{{ route('vapes.update', $vape) }}">
        @csrf
        @method('PUT')
        <label>Name</label>
        <input type="text" name="name" value="{{ $vape->name }}">
        
        <label>Description</label>
        <textarea name="description">{{ $vape->description }}</textarea>
        
        <label>Price</label>
        <input type="text" name="price" value="{{ $vape->price }}">
        
        <label>Stock</label>
        <input type="number" name="stock" value="{{ $vape->stock }}">

        <button type="submit">Update</button>
    </form>
    <label for="category">Categoría:</label>
<select name="category_id" required>
    <option value="">Selecciona una categoría</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ isset($vape) && $vape->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
    @endforeach
</select>
@endsection
