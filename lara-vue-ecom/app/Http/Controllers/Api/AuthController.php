<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
     public function login(Request $request)
     {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);
        if(!Auth::attempt($credentials, $remember)){
            return response([
                'message' => 'Email or password is incorrect'
            ],422);
        }
        $user = Auth::user();
        if(!$user->is_admin){
            Auth::logout();

            return response([
                'message' => 'You don\'t have permission to authenticate as admin'
            ],403);
        }
        $token = $user->createToken('main')->plainTextToken;
        return response([
            'user' => new UserResource($user),
            'token'=> $token

        ]);
     }//end method

     public function logout()
     {
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return response('',204);


     }//end method

     public function getUser(Request $request)
     {
        //return new UserResource($request->user());
        return new UserResource($request->user());
     }//end method


}
