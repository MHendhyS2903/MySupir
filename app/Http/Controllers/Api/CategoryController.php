<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\CategoryEvent;
use App\Models\Category;

class CategoryController extends Controller
{
    public function GetAllCategory()
    {
        $data = Category::all();

        // event(new CategoryEvent($data));

        return response()->json([
            'status' => 'Success !',
            'data' => $data
        ]);
    }
}
