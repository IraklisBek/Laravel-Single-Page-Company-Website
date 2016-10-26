<?php
/**
 * Created by PhpStorm.
 * User: Irakl_000
 * Date: 20/10/2016
 * Time: 11:26 PM
 */

namespace App\Acme\Services;


use App\Team;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TeamService
{
    public static function insertTeamElements(Team $member, Request $request){
        $member->name = $request->get('name');
        $member->skill_id = $request->get('skill_id');
        $member->description = $request->get('description');
        $member->facebook_link = $request->get('facebook_link');
        $member->twitter_link = $request->get('twitter_link');
        $member->linked_in_link = $request->get('linked_in_link');
    }

    public static function insertTeamImage(Team $member, Request $request){
        if($request->hasFile('member-image')){
            $image = $request->file('member-image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('visitor/images/team/'. $filename);
            Image::make($image)->resize(500, 500)->save($location);
            $member->member_image = $filename;
        }
    }

    public static function saveTeam(Team $member){
        try{
            $member->save();
            MessageService::_message('success', 'Team Member Uploaded Successfully');
        }catch(Exception $e){
            MessageService::_message('fail', 'Team Member Could not uploaded: '. $e);
        }
    }

    public static function createOrUpdateTeam(Team $member, Request $request){
        self::insertTeamElements($member, $request);
        self::insertTeamImage($member, $request);
        self::saveTeam($member);
    }
}