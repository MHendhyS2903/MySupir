<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Driver;
class DriverController extends Controller
{
   public function __construct() {
       $this->middleware('auth:drivers', ['except' => ['login', 'register']]);
   }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'nohp' => 'required',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'password' => 'required|string|confirmed|min:6',
            'nohp' => 'required|max:13',
            'address' => 'required',
            'photo' => 'required',
            'gender' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $driver = Driver::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'Driver successfully registered',
            'driver' => $driver
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'Driver successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function driverProfile() {
        return response()->json(auth()->user());
    }

    public function updateDriver(Request $request){
        $this->validate($request,[
            'name' => 'string|between:2,100',
            'nohp' => 'max:13',
            'address' => 'string',
            'photo' => 'string',
        ]);

        $datadriver = Driver::find(auth()->id());
        $datadriver->name = $request->name;
        $datadriver->nohp = $request->nohp;
        $datadriver->address = $request->address;
        $datadriver->photo = $request->photo;

        if($datadriver->save()){
            return response()->json([
                'message' => 'Driver successfully updated.',
                'driver' => $datadriver
            ], 201);
        }else{
            return response()->json([
               'message' => 'Failed to update Driver'
            ], 400);
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
