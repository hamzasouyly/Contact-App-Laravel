<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
    //

    public function index()
    {
        //
        $users = User::All();
        // return response()->json($contacts);
        return new UserCollection($users);
    }

    public function register(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // return response()->json($contact);
        return new UserResource($user);
    }

    public function login(Request $request)
    {
        //
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $user = User::whereEmail($request->email)->first();

        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'message' => 'Connected Succesfully',
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    'message' => 'Invalid Credentiels',
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Invalid Credentiels',
            ]);
        }

    }

    public function profile()
    {
        //
        return new UserResource(auth()->user());
    }

    public function logout()
    {
        //
        
        // auth()->user()->tokens()->delete();
        Auth::user()->tokens->each(function($token) {
            $token->delete();
        });

        return response()->json([
            'message' => 'Logout Succesfully',
        ]); 
    }

}
