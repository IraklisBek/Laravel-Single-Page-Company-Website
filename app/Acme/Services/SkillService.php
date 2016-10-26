<?php
/**
 * Created by PhpStorm.
 * User: Irakl_000
 * Date: 24/10/2016
 * Time: 5:37 PM
 */

namespace App\Acme\Services;


use App\Skill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Psy\Exception\Exception;

class SkillService
{
    public static function insertSkillElements(Skill $skill, Request $request){
        $skill->name = $request->get('name');
        $skill->title = $request->get('title');
        $skill->secondary_title = $request->get('secondary_title');
        $skill->body = $request->get('body');
    }

    public static function getSkillsInArray(Collection $skills){
        $arr = array();
        foreach($skills as $skill)
            $arr[$skill->id] = $skill->name;
        return $arr;
    }


    public static function createOrUpdateSkill(Skill $skill, Request $request){
        self::insertSkillElements($skill, $request);
        ModelService::SaveModelWithMessage($skill, "Skill ", " Uploaded Successfully", "could not be uploaded: ");
    }
}