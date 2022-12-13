<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\ReserveOrder;
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
                        'job_no' => $request->job_number['job_number'],
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
    public function getOrderUsedUsing(){
        return Order::where(['status'=> 'using', 'created_by'=>Auth::id()])->with(['Job', 'Orderer', 'Item', 'Stocker'])->get();
    }
    public function edit($id){
        return Order::with('Job')->find($id);
    }
    public function moveToDelivery(Request $request){
        try {
            $order = Order::find($request->order_id);
            $order->status = 'deliverd';
            $order->stocker_id = $request->warehouse_id;
            $order->update();
            return response()->json([
                'success' => true,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
            ]);
        }
    }
    public function moveToUse($order_id){
        try {
            $order = Order::find($order_id);
            $order->status = 'using';
            $order->update();
            return response()->json([
                'success' => true,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
            ]);
        }
    }
    public function allItemUsed($order_id){
        try {
            $order = Order::find($order_id);
            $order->status = 'used';
            $order->update();
            return response()->json([
                'success' => true,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
            ]);
        }
    }
    public function saveRemaining(Request $request){
        try {
            $order = Order::find($request->order_id);
            if($request->amount > $order->amount ){
                return response()->json([
                    'success' => false,
                    'message' => 'amount',
                ]);
            }else{
                $order->remaining = $request->amount;
                $order->return_to = $request->warehouse_id;
                $order->status = 'return';
                $order->update();
                return response()->json([
                    'success' => true,
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
            ]);
        }
    }
    public function reserveOrder(Request $request){
        // return $request;
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
                    $reserveOrder = new ReserveOrder();
                    $reserveOrder->order_id = $request->order_id;
                    $reserveOrder->job_id = $request->job_number['id'];
                    $reserveOrder->client_id = $request->client_id;
                    $reserveOrder->item_id = $request->item_id;
                    $reserveOrder->stocker_id = $request->stocker_id;
                    $reserveOrder->order_date = $request->order_date;
                    $reserveOrder->amount = $request->amount;
                    $reserveOrder->created_by = $request->created_by;
                    $reserveOrder->updated_by = $request->updated_by;
                    $reserveOrder->save();
                    $order = Order::find($request->order_id);
                    $order->remaining = $order->remaining - $reserveOrder->amount;
                    $order->update();
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
    public function getRemainingList(){
        return Order::where(['status'=> 'return', 'created_by'=>Auth::id()])->with(['Job', 'Orderer', 'Item', 'Stocker'])->get();
    }
    public function reserveOrders($order_id){
        return ReserveOrder::where('order_id', $order_id)->with(['Job', 'Orderer', 'Item', 'Stocker'])->get();
    }   
    public function reserveToUsing(Request $request){
        $transaction = DB::transaction(function () use ($request) {
            try {
                $order = new Order();
                $order->job_id = $request->job_id;
                $order->client_id = $request->client_id;
                $order->item_id = $request->item_id;
                $order->stocker_id = $request->stocker_id;
                $order->order_date = $request->order_date;
                $order->amount = $request->amount;
                $order->status = 'using';
                $order->created_by = $request->created_by;
                $order->updated_by = $request->updated_by;
                $order->save();
                ReserveOrder::find($request->id)->delete();
                return response()->json([
                    'success' => true,
                ]);
            } catch (Exception $ex) {
                DB::rollback();
            }
        });
        return $transaction;
    }
    public function allOrders(){
        return Order::where(['status'=> 'used', 'created_by'=> Auth::id()])->with(['Job', 'Orderer', 'Item', 'Stocker'])->get();
    }
    public function jobSearch($job_no){
        return Order::where(['job_no'=> $job_no, 'created_by'=> Auth::id()])->with(['Job', 'Orderer', 'Item', 'Stocker'])->get();
    }
}
