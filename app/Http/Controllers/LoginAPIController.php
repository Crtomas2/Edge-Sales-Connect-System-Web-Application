<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
// use Illuminate\Validation\ValidationException;

class LoginAPIController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
            'UserRole' => 'required|string|',
            'location_code' => 'required|string'
        ]);

        // Create a new user
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'username'=> $request->username,  
            'UserRole'=>$request->UserRole,    
            'password' => bcrypt($request->password),
            'location_code' => $request->location_code
        ]);

        // Generate a token for the user
        $token = $user->createToken('api_token')->plainTextToken;

        // Return the user and token as a response
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
    
    public function login(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);
    
            // Attempt to authenticate the user
            if (!Auth::attempt($request->only('email', 'password'))) {
                throw new AuthenticationException(__('auth.failed'));
            }
    
            // Get the authenticated user
            $user = $request->user();
    
            // Generate a token for the user
            $token = $user->createToken('api_token')->plainTextToken;
    
            // Return the user and token as a response
            return response()->json([
                'user' => $user,
                'token' => $token,
            ]);
        } catch (AuthenticationException $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => 'Incorrect User Credential.'], 401);
        }
    }
    
    public function logout(Request $request)
    {
        // Revoke the user's token
        $request->user()->currentAccessToken()->delete();

        // Return a success response
        return response()->json(['message' => 'Logged out successfully']);
    }
}
