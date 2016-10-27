<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Visitor\\PagesController@getWebsite')->name('website');
Route::get('/services', 'Visitor\\PagesController@getServices')->name('services');
Route::get('/portfolio', 'Visitor\\PagesController@getPortfolio')->name('portfolio');
Route::get('/team', 'Visitor\\PagesController@getTeam')->name('team');
Route::get('/skills', 'Visitor\\PagesController@getSkills')->name('skills');
Route::get('/contact', 'Visitor\\PagesController@getContact')->name('contact');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/administrator', 'Admin\\AdminController@getIndex');
    Route::get('/admin/index', 'Admin\\AdminController@getIndex')->name('admin.pages.index');
    Route::get('/admin/general', 'Admin\\GeneralController@index')->name('general.index');
    Route::put('/admin/general/{id}/{page}', 'Admin\\GeneralController@update')->name('general.update');
    //Route::resource('/admin/general', 'Admin\\GeneralController');
    Route::resource('/admin/slider', 'Admin\\SliderController');
    Route::resource('/admin/portfolio', 'Admin\\PortfolioController');
    Route::resource('/admin/team', 'Admin\\TeamController');
    Route::resource('/admin/services', 'Admin\\ServicesController');
    Route::resource('/admin/tasks', 'Admin\\TaskController');
    Route::resource('/admin/skills', 'Admin\\SkillsController');
    Route::resource('/admin/subSkills', 'Admin\\SubSkillsController');

    Route::put('/admin/skills/associate/{subSkill}', 'Admin\\SkillsController@associate')->name('admin.pages.skills.associate');


});

//Route::get('login', 'Auth\\LoginController@getLogin')->name('auth.login');
Route::get('/admin/login', 'Admin\\AdminController@getLogin')->name('admin.pages.login');
Route::post('logUser', 'Auth\\LoginController@logUser')->name('auth.logUser');
Route::get('logoutUser', 'Auth\\LoginController@logoutUser')->name('logoutUser');

Route::get('admin/register', 'Auth\\RegisterController@getRegister')->name('admin.pages.register');
Route::post('registerUser', 'Auth\\RegisterController@registerUser')->name('admin.pages.registerUser');
Route::get('confirmRegistration/{token}', 'Auth\\RegisterController@postConfirmRegistration')->name('auth.postConfirmRegistration');

