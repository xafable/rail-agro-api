<?php

namespace App\Http\Controllers;

use App\Http\Resources\BaseResource;
use App\Models\Image;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    function store(Request $request){

        if($request->has('serviceId'))
           Image::saveImageToModel($request->image,$request->id,Service::class);
        elseif ($request->has('subServiceId'))
            Image::saveImageToModel($request->image,$request->id,SubService::class);
        else
           Image::saveImage($request->image);


        return response()->json([
            'success' => true,
            'message' => 'Зображення збережено.',
            'data' => ''
        ]);
    }
}
