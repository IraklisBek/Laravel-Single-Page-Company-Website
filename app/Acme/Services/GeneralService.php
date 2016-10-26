<?php
/**
 * Created by PhpStorm.
 * User: Irakl_000
 * Date: 24/10/2016
 * Time: 12:59 PM
 */

namespace App\Acme\Services;


use App\General;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Psy\Exception\Exception;

class GeneralService
{

    public static function insertGeneralElements(General $general, Request $request, $page){
        if($page=="home") {
            $general->company_name = $request->get('company_name');
            $general->company_facebook = $request->get('company_facebook');
            $general->company_twitter = $request->get('company_twitter');
            $general->company_linked_in = $request->get('company_linked_in');
            $general->company_something = $request->get('company_something');
            self::insertLogo($general, $request);
        }
        if($page=="team"){
            $general->team_title = $request->get('team_title');
            $general->team_secondary_title = $request->get('team_secondary_title');
        }
        if($page=="services"){
            $general->services_title = $request->get('services_title');
            $general->services_secondary_title = $request->get('services_secondary_title');
        }
        if($page=="portfolio"){
            $general->portfolio_title = $request->get('portfolio_title');
            $general->portfolio_secondary_title = $request->get('portfolio_secondary_title');
        }
        if($page=="contact"){
            $general->contact_title = $request->get('contact_title');
            $general->contact_secondary_title = $request->get('contact_secondary_title');
            $general->contact_body = $request->get('contact_body');
            $general->company_lat = $request->get('company_lat');
            $general->company_lng = $request->get('company_lng');
            $general->company_phone = $request->get('company_phone');
            $general->company_address = $request->get('company_address');
            $general->company_email = $request->get('company_email');
        }
    }

    public static function insertLogo(General $general, Request $request){
        if($request->hasFile('logo_image')){
            $image = $request->file('logo_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('visitor/images/'. $filename);
            Image::make($image)->save($location);
            $general->logo_image = $filename;
        }
    }

    public static function saveGeneral(General $general, $page){
        try{
            $general->save();
            MessageService::_message('success', 'General: '.$page.' Updated Successfully');
        }catch(Exception $e){
            MessageService::_message('fail', 'General: '.$page.' could not be uploaded: '. $e);
        }
    }

    public static function createOrUpdateGeneral(General $general, Request $request, $page)
    {
        self::insertGeneralElements($general, $request, $page);
        self::saveGeneral($general, $page);
    }
}