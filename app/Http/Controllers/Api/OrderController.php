<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\OrderEvent;
use App\Models\DriverLoc;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:users,drivers');
    }

    public function postOrder(Request $request)
    {
        $auth=auth()->id();
        
        // $lat = Order::find(1)->location->pickupLat; //'09809'
        // $long = Order::find(1)->location->pickupLong; 

        // $query = DriverLoc::where('driverID', '!=', null);
        // $query = $query->select("*", DB::raw("6371 * acos(cos(radians(".$lat.")) * cos(radians(json_extract(koordinat, '$[0]'))) * cos(radians(json_extract(koordinat, '$[1]')) - radians(".$lang.")) + sin(radians(".$lat.")) * sin(radians(json_extract(koordinat, '$[0]')))) AS distance"))->having('distance', '<=', 10)->get(); // cari tempat radius 10 KM
        
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
