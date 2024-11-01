<?php

namespace App\Http\Controllers;

use App\Models\Vape;
use App\Models\Category;
use Illuminate\Http\Request;

class VapeController extends Controller
{
    public function create()
    {
        $categories = Category::all(); 
        return view('vapes.create', compact('categories')); 
    }

    public function show(Vape $vape)
    {
        $comments = $vape->comments; 
        return view('vapes.show', compact('vape', 'comments'));
    }

    public function index(Request $request)
    {
        $query = Vape::query();
        $categories = Category::all();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $vapes = $query->paginate(3);
        return view('vapes.index', compact('vapes', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id', 
        ]);

        Vape::create($request->all());
        return redirect()->route('vapes.index')->with('success', 'Vape creado correctamente.');
    }

    public function edit(Vape $vape)
    {
        $categories = Category::all(); 
        return view('vapes.edit', compact('vape', 'categories'));
    }

    public function update(Request $request, Vape $vape)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id', 
        ]);

        $vape->update($request->all());
        return redirect()->route('vapes.index')->with('success', 'Vape actualizado correctamente.');
    }

    public function destroy(Vape $vape)
    {
        $vape->delete();
        return redirect()->route('vapes.index')->with('success', 'Vape eliminado correctamente.');
    }
}
