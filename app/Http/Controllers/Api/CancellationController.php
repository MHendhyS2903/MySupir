<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\CancellationEvent;

class CancellationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users,drivers');
    }

    public function postCancellation(Request $request)
    {

        $orderID = $request->input('orderID');
        $reason = $request->input('reason');

        $data = new \App\Models\Cancellation();
        $data->orderID = $orderID;
        $data->reason = $reason;

        if($data->save()){
            // return response($res);
            
            $cancelID = $data->cancelID;
            event(new CancellationEvent($data, $cancelID));

            return response()->json([
                'message' => 'Success',
                'data' => $data
            ], 201);
        }
    }
}
