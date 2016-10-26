<?php
/**
 * Created by PhpStorm.
 * User: Irakl_000
 * Date: 25/10/2016
 * Time: 12:52 PM
 */

namespace App\Acme\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageService
{
    public static function insertImage(Model $model, $item, Request $request, $hasFile, $path, $x, $y){
        if($request->hasFile($hasFile)){
            $image = $request->file($hasFile);
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path($path. $filename);
            Image::make($image)->resize($x, $y)->save($location);
            $model->$item = $filename;
        }
    }
}