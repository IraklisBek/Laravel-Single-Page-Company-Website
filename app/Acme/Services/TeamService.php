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

    public static function createOrUpdateTeam(Team $member, Request $request){
        self::insertTeamElements($member, $request);
        ImageService::insertImage($member, 'member_image', $request, 'member-image', 'visitor/images/team/', 500, 500);
        ModelService::SaveModelWithMessage($member, "Team Member ", " Uploaded Successfully", "could not be uploaded: ");
    }
}