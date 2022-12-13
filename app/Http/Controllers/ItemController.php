<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Order;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $attributeNames = [
            'category' => 'Category',
            'manufacturer' => 'Manufacturer',
            'item_name' => 'Item name',
            'item_number' => 'Item Number',
            'unit' => 'Unit',
        ];

        $messages = [];

        $rules = [
            'category' => 'required',
            'manufacturer' => 'required',
            'item_name' => 'required',
            'item_number' => 'required',
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
            'item_name' => 'Item name',
            'item_number' => 'Item Number',
            'unit' => 'Unit',
        ];

        $messages = [];

        $rules = [
            'category' => 'required',
            'manufacturer' => 'required',
            'item_name' => 'required',
            'item_number' => 'required',
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
            Item::find($request->id)->update($request->all());
            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function index(){
        return Item::latest()->get();
    }
    public function destroy($id){
        $status = ['ordered', 'using'];
        if($item = Item::find($id)){
            $isExist = Order::where(['status'=>$status, 'item_id'=>$id])->first();
            if($isExist){
                return response()->json([
                    'success'   => false,
                    'message' => 'inUse'
                ]);
            }
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
