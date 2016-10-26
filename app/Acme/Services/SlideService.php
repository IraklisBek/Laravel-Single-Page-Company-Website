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

    public static function insertSlideImage(Slide $slide, Request $request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('visitor/images/slider/'. $filename);
            Image::make($image)->resize(1600, 750)->save($location);
            $slide->image = $filename;
        }
    }

    public static function saveSlide(Slide $slide){
        try{
            $slide->save();
            MessageService::_message('success', 'Slider Image Uploaded Successfully');
        }catch(Exception $e){
            MessageService::_message('fail', 'Slider Image Could not uploaded: '. $e);
        }
    }

    public static function createOrUpdateSlide(Slide $slide, Request $request){
        self::insertSlideElements($slide, $request);
        self::insertSlideImage($slide, $request);
        self::saveSlide($slide);
    }
}