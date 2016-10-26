<?php
/**
 * Created by PhpStorm.
 * User: Irakl_000
 * Date: 26/10/2016
 * Time: 5:50 PM
 */

namespace App\Acme\Services;


use Doctrine\DBAL\Query\QueryException;
use Illuminate\Database\Eloquent\Model;

class ModelService
{
    public static function SaveModelWithMessage(Model $model, $kind, $successMsg, $failMsg){
        try{
            $model->save();
            MessageService::_message('success', $kind.' '.$successMsg);
        }catch(QueryException $e){
            MessageService::_message('fail', $kind.' '.$failMsg. ' '. $e);
        }
    }
}