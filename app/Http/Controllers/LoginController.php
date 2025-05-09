<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function __construct()
    {
        // Solo los invitados pueden acceder al login, excepto logout
        $this->middleware('guest')->except('logout');
    }

    // Muestra el formulario de login
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    // Procesa el login
    public function login(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            $request->session()->regenerate(); // Previene ataques de sesión

            return redirect()->intended('/'); // Redirige a la página que quería visitar
        }

        // Si falla el login
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    // Cierra la sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
