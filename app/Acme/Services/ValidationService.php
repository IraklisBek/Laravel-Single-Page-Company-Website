<?php
/**
 * Created by PhpStorm.
 * User: Irakl_000
 * Date: 5/10/2016
 * Time: 11:38 AM
 */

namespace App\Acme\Services;


use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use PhpParser\Node\Expr\Cast\Object_;
use Validator;
use Illuminate\Http\Request;

class ValidationService{

    public static function validateCreation(Request $request, Model $model){
        return Validator::make($request->all(), $model::createRules());
    }

    public static function validateUpdate(Request $request, Model $model){
        return Validator::make($request->all(), $model::updateRules());
    }

    public static function validateUpdateGeneral(Request $request, Model $model, $page){
        if($page=="home")
            return Validator::make($request->all(), $model::updateHomeRules());
        if($page=="team")
            return Validator::make($request->all(), $model::updateTeamRules());
        if($page=="services")
            return Validator::make($request->all(), $model::updateServicesRules());
        if($page=="portfolio")
            return Validator::make($request->all(), $model::updatePortfolioRules());
        if($page=="contact")
            return Validator::make($request->all(), $model::updateContactRules());
    }
}