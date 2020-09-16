<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderNow;
use App\Models\OrderLater;
use App\Models\OrderOntime;

class OrderHistoryController extends Controller
{
    public function GetUserHistoryOrder()
    {
        $auth=auth()->id();
        $ordernow = OrderNow::where('id', $auth)->get();
        $orderlater = OrderLater::where('id', $auth)->get();
        $ontime = OrderOntime::where('id', $auth)->get();

        return response()->json([
            'status' => 'Success !',
            'ordernow' => $ordernow,
            'orderlater' => $orderlater,
            'ontime' => $ontime,
        ]);
    }
}
