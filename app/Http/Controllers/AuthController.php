<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email,id',
            'password' => 'required|string|confirmed|min:6'
        ]);
        $user = User::create([
            'name' =>$fields['name'],
            'email'=>$fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user '=> $user,
            'token'=> $token
        ];
        return response($response ,201);

    }

    public function logout(Request $request){

        $request->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }


   public function login(Request $request)
   {
    $fields = $request->validate([

        'email' => 'required|string',
        'password' => 'required|string|min:6'
    ]);

    //   check email

    $user = User::where('email',$fields['email'])->first();

    if(!$user || Hash::check($fields['password'],$user->password))
    {
        return response([
                  'message' =>'bad creds'
        ],401);
    }

    $token = $user->createToken('mayapptoken')->plainTextToken;

    $response = [
        'user' =>$user,
        'token' => $token
    ];
    return response($request,201);
   }
}
