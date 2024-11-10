<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Email atau Password Anda salah'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        return response()->json(['token' => $token, 'username' => auth()->user()->name]);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function getuser()
    {

        $data = auth()->guard('api')->user();
        return response()->json(
            [
            'name' => $data->name,
            'email' => $data->email,
            'phone' => $data->phone,
            'location' => $data->location
        ]);
    }

    

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
        ]);

        $user = auth()->guard('api')->user()->id;
        User::where('id', $user)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'location' => $request->location
            ]
        );
        return response()->json(['message' => 'Profile successfully updated'], 200);
    }
}
