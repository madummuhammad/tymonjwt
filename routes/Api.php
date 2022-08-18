<?php

$router->group(['prefix'=>'api'],function() use($router){
    $router->post('mahasiswa','MahasiswaController@create');
});