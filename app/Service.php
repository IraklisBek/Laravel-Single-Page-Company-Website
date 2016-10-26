<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public static function createRules(){

        return [
            'background_color' => 'required',
            'title' => 'required',
            'body' => 'required',
            'icon' => 'required'
        ];

    }
}
