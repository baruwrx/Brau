<?php

namespace App\Http\Controllers;

use App\Models\Vape;
use Illuminate\Http\Request;

class VapeController extends Controller
{
    public function index()
    {
        $vapes = Vape::paginate(3);
        return view('vapes.index', compact('vapes'));
    }

    public function create()
    {
        return view('vapes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Vape::create($request->all());
        return redirect()->route('vapes.index')->with('success', 'Vape created successfully.');
    }

    public function edit(Vape $vape)
    {
        return view('vapes.edit', compact('vape'));
    }

    public function update(Request $request, Vape $vape)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $vape->update($request->all());
        return redirect()->route('vapes.index')->with('success', 'Vape updated successfully.');
    }

    public function destroy(Vape $vape)
    {
        $vape->delete();
        return redirect()->route('vapes.index')->with('success', 'Vape deleted successfully.');
    }
}
