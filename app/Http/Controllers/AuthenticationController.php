<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $attributeNames = [
            'login_id' => 'Login ID',
            'login_password' => 'Password',
        ];

        $messages = [];

        $rules = [
            'login_id' => 'required|min:6|integer',
            'login_password' => 'required|min:6',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        } else {
            $Credentials = [
                'login_id'     => $request->login_id,
                'password'  => $request->login_password,
            ];
            if (Auth::attempt($Credentials)) {
                $User = User::where('login_id', $request->login_id)->first();
                if ($User->status == 'inactive') {
                    Auth::logout();
                    return response()->json([
                        'status' => 'activation',
                        'message' => 'Your account is not active yet',
                    ]);
                }else if ($User->status == 'block'){
                    Auth::logout();
                    return response()->json([
                        'status' => 'blocked',
                        'message' => 'Your account has been blocked by Admin',
                    ]);
                }
                 else {
                    Auth::login($User);
                    return response()->json([
                        "message" => "Login Successfully!",
                        'success' => true,
                        'user' => Auth::user(),
                    ]);
                }
            } else {
                return response()->json([
                    'success' => 'credentials',
                    'errors' => 'Credentials Not Matched',
                ]);
            }
        }
    }
}
