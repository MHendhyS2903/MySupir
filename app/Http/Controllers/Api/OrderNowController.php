<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\OrderNowEvent;
use App\Models\Category;

class OrderNowController extends Controller
{
    public function postOrderNow(Request $request)
    {
        $driverID = $request->input('driverID');
        $id = $request->input('id');
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
    
        event(new OrderNowEvent($data));

        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
    }
}
