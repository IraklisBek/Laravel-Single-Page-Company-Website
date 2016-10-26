<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    public static function updateHomeRules(){

        return [
              'company_facebook' => 'required',
              'company_linked_in' => 'required',
              'company_name' => 'required',
              'company_something' => 'required',
              'company_twitter' => 'required',
        ];

    }

    public static function updateServicesRules(){

        return [
            'services_title' => 'required',
            'services_secondary_title' => 'required',
        ];

    }

    public static function updatePortfolioRules(){

        return [
            'portfolio_title' => 'required',
            'portfolio_secondary_title' => 'required',
        ];

    }

    public static function updateContactRules(){

        return [
            'company_lat' => 'required',
            'company_lng' => 'required',
            'company_phone' => 'required',
            'company_address' => 'required',
            'company_email' => 'required',
            'contact_title' => 'required',
            'contact_secondary_title' => 'required',
            'contact_body' => 'required',
        ];

    }

    public static function updateTeamRules(){

        return [
            'team_title' => 'required',
            'team_secondary_title' => 'required',
        ];

    }
}
