<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatData = $request->validate([
            'name' => 'required|max:25',
            'email' => 'email|required|unique:user',
            'password' => 'required|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        return response()->json($user,201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email | required | unique:user',
            'password' => 'required | confirmed',
        ]);
        $login_detail = request(['email','password']);
        if (!Auth::attempt($login_detail)) {
            return response()->json([
                'error' => 'login gagal, cek lagi login detail'
            ], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('AccessToken');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_id' => $token->id,
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ],200);
    }
}
