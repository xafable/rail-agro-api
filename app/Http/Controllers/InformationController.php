<?php

namespace App\Http\Controllers;

use App\Http\Resources\BaseResource;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    function index(){
        $information = Information::query()
            ->where('canceled','=',0)
            ->get();

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => new BaseResource($information)
        ]);
    }
}
