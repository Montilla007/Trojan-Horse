<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Teachers;
use Hash;

class TeachersController extends Controller
{
    
    //REGISTRATION FUNCTION
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'email' => 'required|email|max:30|unique:users',
            'department' => 'required|max:10',
            'password' => 'required|min:5|max:16',
            'confirm_password' => 'required|min:5|max:16|same:password'
        ]);

        if ($validator->fails()){
            return response()->json([
                'message'=> 'Failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Teachers::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'department'=>$request->department,
            'password'=>Hash::make($request->password)
        ]);

        return response()->json([
            'message'=> 'Registration successful',
            'data'=>$user
        ], 200);
    }

    //LOGIN FUNCTION
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:30',
            'password' => 'required|min:5|max:16',

        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        $user = Teachers::where('email', $request->email)->first();

        if($user){
                
            if(Hash::check($request->password,$user->password)){
                    

                return response()->json([
                    'message'=>'Login successful',
                    'data'=>$user
                ], 200);
            }else{
                return response()->json(    [
                    'password' => $user->password,
                    'message' => 'Incorrect credentials'
                ], 400);
                
            }
        }
    }

    //LOGOUT FUNCTION
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'user successfully logged out',
        ], 200);
    }
}
