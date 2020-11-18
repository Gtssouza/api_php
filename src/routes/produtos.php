<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

/*
ORM - Object Relation Mapper
Illuminate - é o motor da base de dados do laravel sem o laravel
Eloquent ORM
*/

//Rotas para produtos
$app->group('/api/v1', function(){
    //lista produtos
    $this->get('/produtos/lista', function($request, $response){
        $produtos = Produto::get();
        return $response->withJson($produtos);
    });

    // Adiciona um produto
	$this->post('/produtos/adiciona', function($request, $response){
		
        $dados = $request->getParsedBody();

		//Validar

		$produto = Produto::create( $dados );
		return $response->withJson( $produto );

    });
    
    //recupera produto para um determinado ID
    $this->get('/produtos/lista/{id}', function($request, $response, $args){
        $produto = Produto::findOrFail($args['id']);
        return $response->withJson($produto);
    });

    // Atualiza produto para um determinado ID
	$this->post('/produtos/atualiza/{id}', function($request, $response, $args){
		
		$dados = $request->getParsedBody();
		$produto = Produto::findOrFail( $args['id'] );
		$produto->update( $dados );
		return $response->withJson( $produto );

	});
});