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
        //Estas son las credenciales para el user y el passw
        $credentials = $request->only(['name', 'password']);
        
        //Autenticamos el user
        if (Auth::attempt($credentials)) {
            //Si el usuario ya está autenticado
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
