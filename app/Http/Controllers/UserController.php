<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use App\Http\Requests\UserLoginRequest;

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


    public function login(UserLoginRequest $request)
    {
        $validated = $request->validated();
        $token = auth('api')->attempt($validated);
        if($token)
        {
            $user=auth('api')->user();
            $response = [
                "email"=>$user->email,
                "token"=>$token,
                "id" =>$user->id                
            ];
            return $this->jsonControllerResponse( $response,200,true);
        }
        else
        {
            $response = [
                "mensaje"=>"Email o password incorrectos"                
            ];
            return $this->jsonControllerResponse( $response,403,false);
        }
        //return json_encode($response);
    }
}
