<?php namespace App\Acme\Container;

use App\Acme\Services\SkillService;
use App\General;
use App\Portfolio;
use App\Service;
use App\Skill;
use App\Slide;
use App\SubSkill;
use App\Team;
use Pimple\Container;

class DataContainer
{
    public static function getOnePageWebsiteData(){
        $data = new Container();
        $data['slides'] = function () {
            return Slide::all();
        };
        $data['members'] = function () {
            return Team::with('subSkills')->get();
        };
        $data['services'] = function () {
            return Service::all();
        };
        $data['portfolio'] = function () {
            return Portfolio::all();
        };
        $data['generals'] = function () {
            return  General::find(1);
        };
        $data['skills'] = function () {
            return  Skill::with('subSkills')->get();
        };
        $data['arrSkills'] = function ($data) {
            return  SkillService::getSkillsInArray($data['skills']);;
        };
        $data['subSkills'] = function () {
            return  SubSkill::all();
        };
        $data['arrSubSkills'] = function ($data) {
            return  SkillService::getSkillsInArray($data['subSkills']);
        };
        return $data;
    }
}