<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DriverVerification;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function addPhotoStart(Request $request, $orderID, $status){
        $this->validate($request,[
            'photo' => 'string',
        ]);

        $verifdata= DriverVerification::create([
            'driverID' => auth()->id(),
            'orderID' => $orderID,
            'photo' => $request->photo,
            'status' => $status
        ]);

        return response()->json([
            'message' => 'Photos verification start added.',
            'data' => $verifdata,
        ], 201);
    }

    public function addPhotoFinish(Request $request, $orderID, $status){
        $this->validate($request,[
            'photo' => 'string',
        ]);

        $verifdata= DriverVerification::create([
            'driverID' => auth()->id(),
            'orderID' => $orderID,
            'photo' => $request->photo,
            'status' => $status
        ]);

        return response()->json([
            'message' => 'Photos verification finish added.',
            'data' => $verifdata,
        ], 201);
    }
}
