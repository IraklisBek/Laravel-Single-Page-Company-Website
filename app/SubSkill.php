<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSkill extends Model
{

    public function skills(){
        return $this->belongsToMany('App\Skill');
    }

    public static function createRules(){

        return [
            'name' => 'required',
            'complete' => 'required',
        ];

    }
}
