<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    //id,pwで認証してtokenを発行
    function login() {
        $credentials = request(['email', 'password']);

        if (! $token = auth("api")->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized', 'responseFlg' => false], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request): JsonResponse
    {
        $validate = $this->validator($request->all());
    
        if ($validate->fails()) {
            return new JsonResponse($validate->errors());
        }
    
        event(new Registered($user = $this->create($request->all())));
    
        return new JsonResponse($user);
    }

    //自分の情報返す
    public function me()
    {
        return response()->json(auth()->user());
    }

    //token発行（内部利用）
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expire_in' => auth('api')->factory()->getTTL(),
            'responseFlg' => true
        ]);
    }
}