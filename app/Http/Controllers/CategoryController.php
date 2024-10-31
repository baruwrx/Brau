<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Mostrar una lista de categorías
    public function index()
    {
        $categories = Category::all(); // Obtener todas las categorías
        return view('categories.index', compact('categories'));
    }

    // Mostrar el formulario para crear una nueva categoría
    public function create()
    {
        return view('categories.create');
    }

    // Almacenar una nueva categoría en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Categoría creada correctamente.');
    }

    // Mostrar el formulario para editar una categoría existente
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Actualizar una categoría existente en la base de datos
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada correctamente.');
    }

    // Eliminar una categoría existente de la base de datos
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
