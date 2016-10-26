<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    public function subSkills(){
        return $this->belongsToMany('App\SubSkill');
    }

    public static function createRules(){

        return [
            'name' => 'required',
            'title' => 'required',
            'secondary_title' => 'required',
            'body' => 'required',
        ];

    }
}
