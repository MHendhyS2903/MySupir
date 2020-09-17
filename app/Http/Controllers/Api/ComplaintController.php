<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\complaintEvent;

class ComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users,drivers');
    }

    public function postComplaint(Request $request)
    {

        $orderID = $request->input('orderID');
        $complaint = $request->input('complaint');
        $photo = $request->input('photo');

        $data = new \App\Models\Complaint();
        $data->orderID = $orderID;
        $data->complaint = $complaint;
        $data->photo = $photo;

        if($data->save()){
            // return response($res);
            
            $complaintID = $data->complaintID;
            event(new ComplaintEvent($data, $complaintID));

            return response()->json([
                'message' => 'Success',
                'data' => $data
            ], 201);
        }
    }
}
