<?php

namespace App\Http\Controllers;

use App\Models\Vape;
use App\Models\Category;
use Illuminate\Http\Request;

class VapeController extends Controller
{
    public function index()
    {
        $vapes = Vape::with('category')->simplePaginate(3);
        return view('vapes.index', compact('vapes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('vapes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Vape::create($validatedData);
        return redirect()->route('vapes.index')->with('success', 'Vape agregado correctamente.');
    }

    public function edit(Vape $vape)
    {
        $categories = Category::all();
        return view('vapes.edit', compact('vape', 'categories'));
    }

    public function update(Request $request, Vape $vape)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $vape->update($validatedData);
        return redirect()->route('vapes.index')->with('success', 'Vape actualizado correctamente.');
    }

    public function destroy(Vape $vape)
    {
        $vape->delete();
        return redirect()->route('vapes.index')->with('success', 'Vape eliminado correctamente.');
    }

    
}
