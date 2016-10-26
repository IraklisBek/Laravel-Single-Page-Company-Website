<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = "team";

    public function subSkills(){
        return $this->belongsToMany('App\SubSkill');
    }

    public function skill(){
        return $this->belongsTo('App\Skill');
    }

    public static function createRules(){

        return [
            'member-image' => 'required',
            'name' => 'required',
            'skill_id' => 'required',
        ];

    }

    public static function updateRules(){

        return [
            'name' => 'required',
            'skill_id' => 'required',
        ];

    }
}
