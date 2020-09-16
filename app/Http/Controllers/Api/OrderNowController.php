<?php

namespace App\Http\Controllers\Api;

use App\Events\AssignDriverOrdernow;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Events\OrderNowEvent;
use App\Models\OrderNow;
use Validator;

class OrderNowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users,drivers');
//        $this->middleware('auth:drivers');
    }

    public function postOrderNow(Request $request)
    {
        $auth=auth()->id();
        $distance = $request->input('distance');
        $driverID = $request->input('driverID');
        $id = $auth;
        $pickupLoc = $request->input('pickupLoc');
        $deliveryLoc = $request->input('deliveryLoc');
        $status = $request->input('status');
        $rates = $request->input('rates');

        $data = new \App\Models\OrderNow();
        $data->driverID = $driverID;
        $data->id = $id;
        $data->pickupLoc = $pickupLoc;
        $data->deliveryLoc = $deliveryLoc;
        $data->status = $status;
        $data->rates = $rates;

        if($data->save()){
            // return response($res);
            
            $orderID = $data->orderID;
            event(new OrderNowEvent($data, $orderID));

            return response()->json([
                'message' => 'Success',
                'data' => $data
            ], 201);
        }
    }

    public function assignDriverOrderNow($id){
        $dataorder = OrderNow::find($id);
        $data = $dataorder;
        if($dataorder->driverID == 1){
            $dataorder->driverID = auth()->id();

            if($dataorder->save()){
                event(new AssignDriverOrderNow($dataorder));
                return response()->json([
                    'message' => 'Order accepted.',
                    'driver' => $dataorder
                ], 201);
            }else{
                return response()->json([
                    'message' => 'Failed to accept order.'
                ], 400);
            }
        }else{
            return response()->json([
                'message' => 'Other driver has accepted the order'
            ], 400);
        }
    }
}
