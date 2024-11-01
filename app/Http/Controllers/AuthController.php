<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar las credenciales de inicio de sesión
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Regenerar la sesión para evitar ataques de fijación de sesión
            $request->session()->regenerate();
            // Redirigir a la vista de vapes después de iniciar sesión
            return redirect()->route('vapes.index'); // Cambia esto a la ruta de tus vapes
        }

        // Si las credenciales no son válidas, volver con error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validar los datos de registro
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Iniciar sesión automáticamente
        Auth::login($user);

        // Redirigir a la vista de vapes después del registro
        return redirect()->route('vapes.index'); // Cambia esto a la ruta de tus vapes
    }

    public function logout(Request $request)
    {
        // Cerrar sesión del usuario
        Auth::logout();
        // Invalidar la sesión
        $request->session()->invalidate();
        // Regenerar el token de sesión
        $request->session()->regenerateToken();

        // Redirigir a la página de inicio de sesión
        return redirect('/login');
    }
}
