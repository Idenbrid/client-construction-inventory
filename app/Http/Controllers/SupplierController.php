<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class SupplierController extends Controller
{
    public function store(Request $request)
    {
        $attributeNames = [
            'supplier_name' => 'Name',
        ];

        $messages = [];

        $rules = [
            'supplier_name' => 'required',
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
            Supplier::create($request->all());
            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function update(Request $request)
    {
        $attributeNames = [
            'supplier_name' => 'Name',
        ];

        $messages = [];

        $rules = [
            'supplier_name' => 'required',
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
            Supplier::find($request->id)->update($request->all());
            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function index(){
        return Supplier::latest()->get();
    }
    public function destroy($id){
        if($supplier = Supplier::find($id)){
            $supplier->delete();
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
