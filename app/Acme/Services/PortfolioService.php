<?php
/**
 * Created by PhpStorm.
 * User: Irakl_000
 * Date: 21/10/2016
 * Time: 2:50 PM
 */

namespace App\Acme\Services;


use App\Portfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Prophecy\Exception\Exception;

class PortfolioService
{
    public static function insertPortfolioElements(Portfolio $portfolio, Request $request){
        $portfolio->body = $request->get('body');
        $portfolio->title = $request->get('title');
    }

    public static function insertPortfolioImage(Portfolio $portfolio, Request $request){
        if($request->hasFile('background_image')){
            $image = $request->file('background_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('visitor/images/gallery/'. $filename);
            Image::make($image)->resize(500, 600)->save($location);
            $portfolio->background_image = $filename;
        }
    }

    public static function createOrUpdatePortfolio(Portfolio $portfolio, Request $request){
        self::insertPortfolioElements($portfolio, $request);
        ImageService::insertImage($portfolio, 'background_image', $request, 'background_image', 'visitor/images/gallery/', 500, 600);
        ModelService::SaveModelWithMessage($portfolio, "Portfolio ", " Uploaded Successfully", "could not be uploaded: ");
    }
}