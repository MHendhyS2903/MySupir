<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rate;
use App\Events\RateEvent;

class RateController extends Controller
{
    public function GetAllRate()
    {
        $data = Rate::all();

        // event(new RateEvent($data));

        return response()->json([
            'status' => 'Success !',
            'data' => $data
        ]);
    }
}
