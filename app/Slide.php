<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{

    protected $table = 'slider';

    public static function createRules(){

        return [
            'image' => 'required',
            'main_title' => 'required',
            'secondary_title' => 'required',
            'button' => 'required'
        ];

    }

    public static function updateRules(){

        return [
            'main_title' => 'required',
            'secondary_title' => 'required',
            'button' => 'required'
        ];

    }
}
