<?php

namespace App\Http\Controllers;

use App\Models\Vape;
use App\Models\Category;
use Illuminate\Http\Request;

class VapeController extends Controller
{
    public function index()
    {
        // Obtén todos los vapes con paginación y carga la relación con la categoría
        $vapes = Vape::with('category')->simplePaginate(3);
        return view('vapes.index', compact('vapes'));
    }

    public function create()
    {
        // Obtén todas las categorías para usarlas en el formulario de creación
        $categories = Category::all();
        return view('vapes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Valida los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Crea un nuevo registro de vape con los datos validados
        Vape::create($validatedData);
        return redirect()->route('vapes.index')->with('success', 'Vape agregado correctamente.');
    }

    public function edit(Vape $vape)
    {
        // Obtén todas las categorías para el formulario de edición
        $categories = Category::all();
        return view('vapes.edit', compact('vape', 'categories'));
    }

    public function update(Request $request, Vape $vape)
    {
        // Valida los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Actualiza el registro de vape
        $vape->update($validatedData);
        return redirect()->route('vapes.index')->with('success', 'Vape actualizado correctamente.');
    }

    public function destroy(Vape $vape)
    {
        // Elimina el registro de vape
        $vape->delete();
        return redirect()->route('vapes.index')->with('success', 'Vape eliminado correctamente.');
    }
}
