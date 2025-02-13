<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $users = User::create($request->all());
        return response($users);
    }
    public function login()
    {
        $credentials = request(['name', 'password']);
        //return !$token = Auth::attempt($credentials);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'No autorizado'], 401);
        }
        $admin = Auth::guard('api')->user();

        return $this->respondWithToken($token,  $admin);
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
