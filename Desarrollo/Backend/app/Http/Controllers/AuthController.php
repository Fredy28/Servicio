<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $users = User::create($request->all());
        return response($users);
    }

    public function login(Request $request)
    {
        // Obtenemos las credenciales (nombre y contraseña)
        $credentials = $request->only(['name', 'password']);
        
        // Intentamos autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa, obtenemos el usuario autenticado
            $user = Auth::user();
            
            // Devolvemos la respuesta con el usuario
            return response()->json([
                'message' => 'Autenticación exitosa',
                'user' => $user,
            ]);
        }

        // Si la autenticación falla, devolvemos un error 401
        return response()->json(['error' => 'No autorizado'], 401);
        
    }

    protected function respondWithToken($token, $admin)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'admin' => $admin,
        ]);
    }
}
