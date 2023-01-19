<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $attributeNames = [
            'user_name' => 'User Name',
            'login_id' => 'Login ID',
            'login_password' => 'Password',
            'type' => 'Type',
        ];

        $messages = [];

        $rules = [
            'user_name' => 'required',
            'login_id' => 'required|min:6|unique:users,login_id,NULL,id,deleted_at,NULL',
            'login_password' => 'required|min:6',
            'type' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user = new User();
            $user->user_name = $request->user_name;
            $user->login_id = $request->login_id;
            $user->type = $request->type;
            $user->password = $request->login_password;
            $user->created_by = Auth::id();
            $user->updated_by = Auth::id();
            $user->save();
            // $request->request->add([
            //     'password' => Hash::make($request->login_password),
            //     'created_by' => Auth::id(),
            //     'updated_by' => Auth::id(),
            // ]);
            // $user = User::create($request->all());
            return response()->json([
                'success' => true,
                'user' => Auth::user(),
            ]);
        }
    }
    public function login(Request $request)
    {
        $attributeNames = [
            'login_id' => 'Login ID',
            'login_password' => 'Password',
        ];

        $messages = [];

        $rules = [
            'login_id' => 'required|min:6',
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
    public function update(Request $request)
    {
        $attributeNames = [
            'user_name' => 'User Name',
            'login_id' => 'Login ID',
            'login_password' => 'Password',
            'type' => 'Type',
        ];

        $messages = [];

        $rules = [
            'user_name' => 'required',
            'login_id' => 'required',
            'login_password' => $request->login_password ? 'min:6' : '',
            'type' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        } else {
            $request->request->add([
                'updated_by' => Auth::id(),
            ]);
            if($request->login_password){
                $request->request->add([
                    'password' => Hash::make($request->login_password),
                ]);
            }
            User::find($request->id)->update($request->all());
            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return response()->json([
            'success'   => true,
        ]);
    }
    public function list(){
        return User::where('id', '!=', Auth::id())->latest()->get();
    }
    public function delete($id){
        $status = ['ordered', 'using'];
        if($user = User::find($id)){
            $isExist = Order::where(['status'=>$status, 'created_by'=>$id])->first();
            if($isExist){
                return response()->json([
                    'success'   => false,
                    'message' => 'inUse'
                ]);
            }
            $user->delete();
            return response()->json([
                'success'   => true,
            ]);
        }else{
            return response()->json([
                'success'   => false,
            ]);
        }
    }
    public function currentUser(){
        return Auth::user();
    }
    public function authLogin(){
        if(Auth::check()){
            return response()->json([
                'success'   => true,
            ]);
        }else{
            return response()->json([
                'success'   => false,
            ]);
        }
    }
}
