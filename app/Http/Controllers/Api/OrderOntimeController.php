<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderOntimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    public function postOrderOntime(Request $request)
    {
        $auth=auth()->id();
        $driverID = $request->input('driverID');
        $id = $auth;
        $pickupLoc = $request->input('pickupLoc');
        $deliveryLoc = $request->input('deliveryLoc');
        $startDate = $request->input('startDate');
        $startTIme = $request->input('startTIme');
        $endDate = $request->input('endDate');
        $endTIme = $request->input('endTIme');
        $status = $request->input('status');
        $rates = $request->input('rates');
    
        $data = new \App\Models\OrderNow();
        $data->driverID = $driverID;
        $data->id = $id;
        $data->pickupLoc = $pickupLoc;
        $data->deliveryLoc = $deliveryLoc;
        $data->startDate = $startDate;
        $data->startTIme = $startTIme;
        $data->endDate = $endDate;
        $data->endTIme = $endTIme;
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
