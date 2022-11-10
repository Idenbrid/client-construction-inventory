<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $attributeNames = [
            'category' => 'Category',
            'manufacturer' => 'Manufacturer',
            'product_name' => 'Product name',
            'model_number' => 'Model Number',
            'unit' => 'Unit',
        ];

        $messages = [];

        $rules = [
            'category' => 'required',
            'manufacturer' => 'required',
            'product_name' => 'required',
            'model_number' => 'required',
            'unit' => 'required',
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
            Item::create($request->all());
            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function update(Request $request)
    {
        $attributeNames = [
            'category' => 'Category',
            'manufacturer' => 'Manufacturer',
            'product_name' => 'Product name',
            'model_number' => 'Model Number',
            'unit' => 'Unit',
        ];

        $messages = [];

        $rules = [
            'category' => 'required',
            'manufacturer' => 'required',
            'product_name' => 'required',
            'model_number' => 'required',
            'unit' => 'required',
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
            Item::find($request->id)->create($request->all());
            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function list(){
        return Item::latest()->get();
    }
    public function delete($id){
        if($item = Item::find($id)){
            $item->delete();
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
