<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','signup']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|max:30',
            'password' => 'required',
            'moino' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        // if fail
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()],409);
        }
        $admin=new User();
        // creating user

        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->type="admin";
        $admin->phone=$request->phone;
        $admin->moinumber=$request->moino;
        $admin->location=$request->location;
        $admin->password=bcrypt($request->password);

        try {
//            Mail::send('emails.newUserRegistered', ['user' => $admin], function ($m) use ($request) {
//                $m->from(Config::get('myconfig.mail.from'), Config::get('myconfig.mail.name'));
//
//                $m->to(Config::get('myconfig.mail.from'),"Dear Admin")
//                    ->subject("New User Registration");
//            });
            $admin->save();
            return response()->json(['msg'=>"You have been Registered Successfully"],200);
        }
        catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()],409);
        }

        ;


    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = Auth::guard('api')->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(Auth::guard('api')->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */

}
