<?php

namespace App\Http\Controllers\Api;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function loginUser(Request $request){
        try{
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            if($validateUser->fails())
            {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record',
                ], 401);
            }

            $user = User::where('email', $request->email )->first();
            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request){
        $req = $request->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => "Logged Out Successsfully"
        ]);
    }
}
