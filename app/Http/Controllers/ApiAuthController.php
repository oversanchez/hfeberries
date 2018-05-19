<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Hash;

class ApiAuthController extends Controller
{
    //

    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $email = $request->input('email');
        $password =  $request->input('password');
        $user = \App\User::where('email',$email)->firstOrFail();
        if($user != null){
            $user_info = \App\User_Info::where('user_id',$user->id)->firstOrFail();
            if(Hash::check($password,$user_info->clave)){
                if($user_info->activo == true){
                    try {
                        $credentials = $request->only('email','password');
                        $token = JWTAuth::attempt($credentials);
                        //$token = JWTAuth::fromUser($user);
                        if(!$token){
                            return response()->json(['error' => 'invalid_credentials3'], 401);
                        }
                        //$token = JWTAuth::fromUser($user);
                        return response()->json(['token' => $token],200);

                    } catch (JWTException $e) {
                        // something went wrong whilst attempting to encode the token
                        return response()->json(['error' => 'could_not_create_token'], 500);
                    }
                }else{
                    return response()->json(['error' => 'Usuario inactivo'], 401);
                }
            }else{
                return response()->json(['error' => 'Credenciales Inválidas'], 401);
            }
        }else{
            return response()->json(['error' => 'Credenciales Inválidas'], 401);
        }
    }

    public function authenticate2(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {

                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function logout(Request $request){
        try {
            //$token = $request->input("token");
            JWTAuth::parseToken()->invalidate();
            return response()->json(['message' => "correcto"],200);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'Could no logout'], 500);
        }
    }
}

