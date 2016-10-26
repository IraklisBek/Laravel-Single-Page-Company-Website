<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = "portfolio";

    public static function createRules(){

        return [
            'background_image' => 'required',
            'body' => 'required',
            'title' => 'required'
        ];

    }

    public static function updateRules(){

        return [
            'body' => 'required',
            'title' => 'required'
        ];

    }
}
