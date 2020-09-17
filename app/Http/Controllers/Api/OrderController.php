<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\OrderEvent;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:users,drivers');
    }

    public function postOrder(Request $request)
    {
        $auth=auth()->id();
        $distance = $request->input('distance');

        $driverID = $request->input('driverID');
        $id = $auth;
        $categoryID = $request->input('categoryID');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $status = $request->input('status');
        $rates = $request->input('rates');

        $data = new \App\Models\Order();
        $data->driverID = $driverID;
        $data->id = $id;
        $data->categoryID = $categoryID;
        $data->startDate = $startDate;
        $data->endDate = $endDate;
        $data->startTime = $startTime;
        $data->endTime = $endTime;
        $data->status = $status;
        $data->rates = $rates;

        if($data->save()){
            // return response($res);
            
            $orderID = $data->orderID;
            event(new OrderEvent($data, $orderID));

            return response()->json([
                'message' => 'Success',
                'data' => $data
            ], 201);
        }
    }
}
