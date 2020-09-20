<?php

//LOGIN COM JWT
Route::post('auth', 'Api\AuthCtrl@authenticate');
//RETORNA O USUARIO LOGADO COM JWT
Route::get('me_auth', 'Api\AuthCtrl@getAuthenticatedUser');
//ATUALIZA O TOKEN DO USUARIO
Route::post('auth-refresh', 'Api\AuthCtrl@refreshToken');

//Cadastro de usuários
Route::post('user/add', 'Api\AuthCtrl@create');


//ROTAS PROTEGIDAS POR JWT

Route::group([
    'prefix'        => 'v1',
    'namespace'     => 'Api\v1',
    'middleware'    => 'auth:api'
], function (){

    //AQUI DENTRO ROTAS PROTEGIDAS


});

