<?php

namespace App\Http\Controllers;

use App\Models\Modelo1; 
use Illuminate\Http\Request;

class brau123 extends Controller
{
    public function store(Request $request)
    {
    
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        Modelo1::create($data);

        return redirect()->back()->with('success', 'Datos insertados correctamente.');
    }
}
