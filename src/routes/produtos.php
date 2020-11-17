<?php

use Slim\Http\Request;
use Slim\Http\Response;

/*
ORM - Object Relation Mapper
Illuminate - é o motor da base de dados do laravel sem o laravel
Eloquent ORM
*/

//Rotas para produtos
$app->group('/api/v1', function(){
    $this->get('/produtos/lista', function($request, $response){
        return $response->withJson(['nome' => 'Moto G']);
    });
});