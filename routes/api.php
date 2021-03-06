<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->group(function () {

    /*Auth*/
    Route::get('/user', 'AuthController@user');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/update_user', 'AuthController@updateUser');
    Route::post('/delete_user', 'AuthController@deleteUser');

    /*Roles*/
    Route::apiResource('roles', 'API\RolesController', ['except' => ['create', 'edit']]);

    /*Users*/
    Route::apiResource('users', 'API\UsersController', ['except' => ['create', 'edit']]);
    Route::post('/update_foto', 'API\UsersController@updateFoto');

    /*Preferencias*/
    Route::post('/preferences/update', 'API\PreferencesController@updatePreferences');

    /*Chats*/
    Route::apiResource('chats', 'API\ChatsController', ['only' => ['index', 'store']]);
    Route::get('getMessage', 'API\ChatsController@fetchMessages');
    Route::post('send', 'API\ChatsController@sendMessages');

    /*Grupos*/
    Route::apiResource('groups', 'API\GruposController', ['only' => ['show']]);
});


/*Auth*/
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

/*Preferencias*/
Route::get('/preferences', 'API\PreferencesController@getPreferences');
