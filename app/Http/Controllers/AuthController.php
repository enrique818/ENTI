<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember')??false)) {
            $request->session()->regenerate();
            return response()->json([
                'url' => Session::get('url.intended', route('panel')),
                'message' => "Inicio de sesión exitoso"
            ]);
        }

        return response()->json([
            'message' => "Fallo el inicio de sesión"
        ], 401);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }

    public function loginPage()
    {
        return view('template.auth.login');
    }

    public function conectado(Request $request)
    {
        $logged = false;
        if (Auth::check()) {
            $logged = true;
        }
        return response()->json([
            'logged' => $logged
        ]);
    }
}
