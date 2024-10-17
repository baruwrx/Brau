<?php

namespace App\Http\Controllers;

use App\Models\Vape;
use Illuminate\Http\Request;

class VapeController extends Controller
{
    public function index()
    {
        $vapes = Vape::all();
        return view('vapes.index', compact('vapes'));
    }

    public function create()
    {
        return view('vapes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Vape::create($validatedData);
        return redirect()->route('vapes.index')->with('success', 'Vape agregado correctamente.');
    }

    public function edit(Vape $vape)
    {
        return view('vapes.edit', compact('vape'));
    }

    public function update(Request $request, Vape $vape)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
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
