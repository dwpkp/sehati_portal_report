<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|string|max:255',
          'username' => 'required|string|max:20|unique:users',
          'password' => 'required|string|min:6',
          'npk' => 'required|string|max:6',
        ]);

        $user = User::create([
          'name' => $request['name'],
          'username' => $request['username'],
          'email' => $request['email'],
          'cluster_id' => $request['cluster_id'],
          'job_id' => $request['job_id'],
          'role_id' => $request['role_id'],
          'password' => bcrypt($request['password']),
          'npk'=>$request['npk']
        ]);

        $token = $user->createToken('TutsForWeb')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
