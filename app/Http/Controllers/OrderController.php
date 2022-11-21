<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Site;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getSettings()
    {
        return response()->json([
            'items' => Item::all(),
            'sites' => Site::all(),
            // 'suppliers' => Supplier::all(),
            'warehouses' => Warehouse::all(),
            'users' => User::where('type', 'manager')->get(),
        ]);
    }
    public function postOrder(Request $request)
    {
        $attributeNames = [
            'job_number' => 'Job number',
            'site_name' => 'Site name',
            'order_date' => 'Order Date',
            'client_id' => 'Client',
            'item_id' => 'Item',
            'stocker_id' => 'Stock',
            'amount' => 'Amount',
        ];

        $messages = [];

        $rules = [
            'job_number' => 'required',
            'order_date' => 'required',
            'client_id' => 'required',
            'item_id' => 'required',
            'stocker_id' => 'required',
            'amount' => 'required',
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
            $transaction = DB::transaction(function () use ($request) {
                try {
                    $request->request->add([
                        'status' => 'ordered',
                        'job_id' => $request->job_number['id'],
                        'created_by' => Auth::id(),
                        'updated_by' => Auth::id(),
                    ]);
                    Order::create($request->all());
                    return response()->json([
                        'success' => true,
                    ]);
                } catch (Exception $ex) {
                    DB::rollback();
                }
            });
            return $transaction;
        }
    }
    public function updateOrder(Request $request)
    {
        $attributeNames = [
            'job_number' => 'Job number',
            'site_name' => 'Site name',
            'order_date' => 'Order Date',
            'client_id' => 'Client',
            'item_id' => 'Item',
            'stocker_id' => 'Stock',
            'amount' => 'Amount',
        ];

        $messages = [];

        $rules = [
            'job_number' => 'required',
            'order_date' => 'required',
            'client_id' => 'required',
            'item_id' => 'required',
            'stocker_id' => 'required',
            'amount' => 'required',
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
            $transaction = DB::transaction(function () use ($request) {
                try {
                    $request->request->add([
                        'status' => 'ordered',
                        'job_id' => $request->job_number['id'],
                        'created_by' => Auth::id(),
                        'updated_by' => Auth::id(),
                    ]);
                    Order::find($request->id)->update($request->all());
                    return response()->json([
                        'success' => true,
                    ]);
                } catch (Exception $ex) {
                    DB::rollback();
                }
            });
            return $transaction;
        }
    }
    public function list($type){
        return Order::where(['status'=>$type, 'created_by'=> Auth::id()])->with(['Job', 'Orderer', 'Item', 'Stocker'])->get();
    }
    public function edit($id){
        return Order::with('Job')->find($id);
    }
}
