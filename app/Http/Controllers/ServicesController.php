<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    function index(){
        $services = Service::query()
            ->get();

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => ServiceResource::collection($services)
        ]);
    }

    function get($id){
        $services = Service::query()
            ->find($id);

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => new ServiceResource($services)
        ]);
    }

}
