<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function register() {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
  
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
  
        $user = new User;
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);
        $user->save();
  
        return response()->json($user, 201);
    }
    public function login()
    {
        $credentials = request(['email', 'password']);
  
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user=auth('api')->user();
        $body=[
            "name"=>$user->name,
            "email"=>$user->email,
            "token"=>$token
        ];
        return response()->json($body);
    }
}
