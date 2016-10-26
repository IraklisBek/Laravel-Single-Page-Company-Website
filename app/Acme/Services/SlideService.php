<?php
/**
 * Created by PhpStorm.
 * User: Irakl_000
 * Date: 20/10/2016
 * Time: 2:42 PM
 */

namespace App\Acme\Services;


use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use League\Flysystem\Exception;

class SlideService
{

    public static function insertSlideElements(Slide $slide, Request $request){
        $slide->main_title = $request->get('main_title');
        $slide->secondary_title = $request->get('secondary_title');
        $slide->button = $request->get('button');
    }

    public static function createOrUpdateSlide(Slide $slide, Request $request){
        self::insertSlideElements($slide, $request);
        ImageService::insertImage($slide, 'image', $request, 'image', 'visitor/images/slider/', 1600, 750);
        ModelService::SaveModelWithMessage($slide, "Slide Image ", " Uploaded Successfully", "could not be uploaded: ");
    }
}