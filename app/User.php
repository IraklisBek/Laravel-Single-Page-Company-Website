<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function roles(){ return $this->belongsToMany('App\User'); }

    private function isRole($the_role){
        if( ! $this->relationLoaded('roles')) $this->load('roles');
        foreach ($this->roles as $role) {
            if($role->name == $the_role)
                return true;
        }
        return false;
    }

    public function isAdmin(){
        return $this->isRole('admin');
    }

    public function isSuperAdmin(){
        return $this->isRole('super-admin');
    }

    public function isAdminTesting(){
        return $this->role == "admin" ? true : false;
    }

    public function isSuperAdminTesting(){
        return $this->role == "super-admin" ? true : false;
    }

    public static function createRules(){

        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            //'role' => 'required',
            'password' => 'required|min:6|regex:/^[a-zA-Z0-9!$#%]+$/',
            //'g-recaptcha-response' => 'required',
        ];

    }











}
