<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Image extends Model
{
    use HasFactory;


    static function saveImageToModel($imageData,$modelId,$modelType): bool
    {
        $imgUrl = self::_saveToStorage($imageData);
        Image::query()->insert(
            [
                'imageable_id'=>$modelId,
                'imageable_type'=>$modelType,
                'image_url'=>$imgUrl,
                'canceled'=>0,
                'created_at'=>Carbon::now(),
                'original_name'=>$imageData->getClientOriginalName(),

            ]
        );
        return true;
    }

    static function saveImage($imageData): bool
    {
        $imgUrl = self::_saveToStorage($imageData);
        Image::query()->insert(
            [
                'service_id'=>null,
                'image_url'=>$imgUrl,
                'canceled'=>0,
                'created_at'=>Carbon::now(),
                'original_name'=>$imageData->getClientOriginalName(),

            ]
        );
        return true;
    }


    private static function _saveToStorage($image): string
    {
        $imgName = $image->hashName();
        $pathName = 'images';
        $image->storeAs($pathName, $image->hashName(),'public');
        return 'storage/'.$pathName.'/'.$imgName;
    }
}
