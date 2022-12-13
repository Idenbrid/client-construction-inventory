<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class WarehouseController extends Controller
{
    public function store(Request $request)
    {
        $attributeNames = [
            'warehouse_name' => 'Name',
        ];

        $messages = [];

        $rules = [
            'warehouse_name' => 'required',
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
            Warehouse::create($request->all());
            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function update(Request $request)
    {
        $attributeNames = [
            'warehouse_name' => 'Name',
        ];

        $messages = [];

        $rules = [
            'warehouse_name' => 'required',
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
            Warehouse::find($request->id)->update($request->all());
            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function index(){
        return Warehouse::latest()->get();
    }
    public function destroy($id){
        $status = ['ordered', 'using'];
        if($warehouse = Warehouse::find($id)){
            $isExist = Order::where(['status'=>$status, 'stocker_id'=>$id])->first();
            if($isExist){
                return response()->json([
                    'success'   => false,
                    'message' => 'inUse'
                ]);
            }
            $warehouse->delete();
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
