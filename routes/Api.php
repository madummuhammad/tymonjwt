<?php

$router->group(['prefix'=>'auth'],function($router){
    $router->post('register','AuthController@register');
    $router->post('login','AuthController@login');
});

$router->group(['prefix'=>'api'],function() use($router){
    $router->post('mahasiswa','MahasiswaController@create');
    $router->get('mahasiswa','MahasiswaController@getMahasiswa');
    $router->delete('mahasiswa/{nim}','MahasiswaController@delete');
    $router->patch('mahasiswa','MahasiswaController@update');
});