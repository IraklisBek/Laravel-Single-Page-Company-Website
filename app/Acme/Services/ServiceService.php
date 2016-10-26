<?php
/**
 * Created by PhpStorm.
 * User: Irakl_000
 * Date: 21/10/2016
 * Time: 12:06 PM
 */

namespace App\Acme\Services;


use App\Service;
use Illuminate\Http\Request;

class ServiceService
{
    public static function insertServiceElements(Service $service, Request $request){
        $service->background_color = $request->get('background_color');
        $service->title = $request->get('title');
        $service->body = $request->get('body');
        $service->icon = $request->get('icon');
    }

    public static function saveService(Service $service){
        try{
            $service->save();
            MessageService::_message('success', 'Slider Image Uploaded Successfully');
        }catch(Exception $e){
            MessageService::_message('fail', 'Slider Image Could not uploaded: '. $e);
        }
    }

    public static function createOrUpdateService(Service $service, Request $request){
        self::insertServiceElements($service, $request);
        self::saveService($service);
    }
}