<?php

namespace App\Http\Controllers\API;




use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register (request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $access_token =$user->createToken('authToken')->plainTextToken;
        if($user){
            return response()->json([
                'status'=>'201',
                'message'=>'User has been created successfully.',
                'token'=> $access_token
                ], 201);
        }else{
            return response()->json([
                'status'=>'404',
                'message'=>'somethings was worng'
                ], 404);
        }

        // Authenticate the user
        Auth::login($user);

       
    }

    public function login(request $request)
    {
        $credentials=$request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
       
        if(Auth::attempt($credentials)){
         $user=Auth::user();
         $access_token =$user->createToken('authToken')->plainTextToken;
        
         return response()->json([
             'success'=>true,
             
             'token'=>$access_token,
             'message'=>'User logged-in successfully'
         ]);
        }else{
         return response()->json([
             'success'=>false,
             'message'=>'Email or Password is incorrect!'
         ]);
        }
      
}}

