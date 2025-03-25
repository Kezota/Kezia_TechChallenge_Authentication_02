<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // COMMENT: This is the register function using Passport (token based authentication)
    public function register(Request $request)
    {
        try {
            // COMMENT: Validate the request
            $validatedData = $request->validate([
                'name' => 'required|max:55',
                'email' => 'email|required|unique:users',
                'password' => 'required'
            ]);

            // COMMENT: Hash the password
            $validatedData['password'] = bcrypt($request->password);

            // COMMENT: Create the user
            $user = User::create($validatedData);

            // COMMENT: Create the token
            $token = $user->createToken('token')->accessToken;

            // COMMENT: Return the token as a response with status code 201 (Created)
            return response()->json(['token' => $token], 201);
        } catch (\Exception $e) {
            // COMMENT: Return an error response with status code 500 (Internal Server Error)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // COMMENT: This is the login function using Passport (token based authentication)
    public function login(Request $request)
    {
        // COMMENT: Validate the request
        $credentials  = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        // COMMENT: Attempt to login
        if (Auth::attempt($credentials)) {
            try {
                // COMMENT: Get the current user
                /** @var \App\Models\User */
                $currentUser = Auth::user();

                // COMMENT: Create the token
                $token = $currentUser->createToken('token')->accessToken;

                // COMMENT: Return the token as a response with status code 201 (Created)
                return response()->json(['token' => $token], 201);
            } catch (\Exception $e) {
                // COMMENT: Return an error response with status code 500 (Internal Server Error)
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        // COMMENT: Return an error response with status code 401 (Unauthorized)
        return response()->json(['error' => 'Unauthorised'], 401);
    }

    // COMMENT: This is the logout function using Passport (token based authentication)
    public function logout(Request $request)
    {
        try {
            // COMMENT: Revoke/Remove the token from the user
            $request->user()->token()->revoke();

            // COMMENT: Return a success response with status code 200 (OK)
            return response()->json(['message' => 'Successfully logged out'], 200);
        } catch (\Exception $e) {
            // COMMENT: Return an error response with status code 500 (Internal Server Error)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
