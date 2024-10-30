<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\responseTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use responseTrait;
    public function login(Request $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return $this->errorResponse(message: 'Invalid login details', code: 401);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'token_type' => 'Bearer',
            'access_token' => $token,
            'user' => $user
        ]);
    }
}
