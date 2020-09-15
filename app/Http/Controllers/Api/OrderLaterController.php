<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\OrderLaterEvent;
use App\Models\OrderLater;
use Validator;

class OrderLaterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    public function postOrderLater(Request $request)
    {
        $auth=auth()->id();
        $driverID = $request->input('driverID');
        $id = $auth;
        $pickupLoc = $request->input('pickupLoc');
        $deliveryLoc = $request->input('deliveryLoc');
        $rentalDate = $request->input('rentalDate');
        $rentalTime = $request->input('rentalTime');
        $status = $request->input('status');
        $rates = $request->input('rates');
    
        $data = new \App\Models\OrderNow();
        $data->driverID = $driverID;
        $data->id = $id;
        $data->pickupLoc = $pickupLoc;
        $data->deliveryLoc = $deliveryLoc;
        $data->rentalDate = $rentalDate;
        $data->rentalTime = $rentalTime;
        $data->status = $status;
        $data->rates = $rates;

        if($data->save()){
            // return response($res);

            event(new OrderNowEvent($data));

            return response()->json([
                'message' => 'Success',
                'data' => $data
            ], 201);
        }
    }
}
