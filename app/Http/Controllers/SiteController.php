<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class SiteController extends Controller
{
    public function store(Request $request)
    {
        $attributeNames = [
            'job_number' => 'Job number',
            'site_name' => 'Site name',
        ];

        $messages = [];

        $rules = [
            'job_number' => 'required|unique:sites,job_number,NULL,id,deleted_at,NULL',
            'site_name' => 'required',
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
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);
            Site::create($request->all());
            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function update(Request $request)
    {
        $attributeNames = [
            'job_number' => 'Job number',
            'site_name' => 'Site name',
        ];

        $messages = [];

        $rules = [
            'job_number' => 'required',
            'site_name' => 'required',
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
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);
            Site::find($request->id)->update($request->all());
            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function index(){
        return Site::latest()->get();
    }
    public function destroy($id){
        $status = ['ordered', 'using'];
        if($site = Site::find($id)){
            $isExist = Order::where(['status'=>$status, 'client_id'=>$id])->first();
            if($isExist){
                return response()->json([
                    'success'   => false,
                    'message' => 'inUse'
                ]);
            }
            $site->delete();
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
