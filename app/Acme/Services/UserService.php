<?php

namespace App\Acme\Services;

use App\Acme\Services\MessageService;
use Validator;
use App\User;

class UserService{

    /**
     * Finds user by email
     * @param $email
     * @return false with error if user is not found, else the user
     */
    public static function getUserByEmail($email) {
        $user = User::where('email', $email)->get();
        if($user->count()){
            return $user->first();
        }else{
            MessageService::_message('fail', 'There has been an error. Please check your email address.');
            return false;
        }
    }

    /**
     * Finds user by Token
     * @param $token
     * @return bool
     */
    public static function getUserByToken($token) {
        $user = User::where('confirm_token', $token)->get();
        if($user->count()){
            return $user->first();
        }else{
            MessageService::_message('fail', 'There has been an error.');
            return false;
        }
    }

    /**
     * Compares if passwords are matching
     *
     * @param $password
     * @param $confirmPassword
     * @return bool
     */
    public static function passwordsMismatch($password, $confirmPassword){
        if(strcmp($password, $confirmPassword)!=0){
            MessageService::_message('fail', 'Password do not mutch');
            return true;
        }
        return false;
    }


}