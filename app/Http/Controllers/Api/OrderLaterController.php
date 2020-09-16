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
        $rentalTIme = $request->input('rentalTIme');
        $status = $request->input('status');
        $rates = $request->input('rates');
    
        $data = new \App\Models\OrderLater();
        $data->driverID = $driverID;
        $data->id = $id;
        $data->pickupLoc = $pickupLoc;
        $data->deliveryLoc = $deliveryLoc;
        $data->rentalDate = $rentalDate;
        $data->rentalTIme = $rentalTIme;
        $data->status = $status;
        $data->rates = $rates;

        if($data->save()){
            // return response($res);

            // event(new OrderLaterEvent($data));

            return response()->json([
                'message' => 'Success',
                'data' => $data
            ], 201);
        }
    }
}
