<?php
if (PHP_SAPI != 'cli') {
    exit('Rodar via CLI');
}

require __DIR__ . '/vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');

$schema = $db->schema();
$tabela = 'produtos';

$schema->dropIfExists($tabela);

//cria a tabela de produtos
$schema->create($tabela, function($table){
    //para criar consultar documentação do laravel
    $table->increments('id');
    $table->string('titulo', 100);
    $table->text('descricao');
    $table->decimal('preco', 11, 2);
    $table->string('fabricante');
    $table->date('dt_criacao');
});

$db->table($tabela)->insert([
    'titulo' => 'Smarthphone Motorola Moto G6 32GB Dual Chip',
    'descricao' => 'Android Oreo - 8.0 Tela 5.7',
    'preco' => 899.99,
    'fabricante' => 'Motorola',
    'dt_criacao' => '2019-10-22'
]);

$db->table($tabela)->insert([
    'titulo' => 'Iphone X Cinza Espacial 64GB',
    'descricao' => 'Tela 5.8" IOS 12 4G Wi-fi Camera 12MP',
    'preco' => 4999.00,
    'fabricante' => 'Apple',
    'dt_criacao' => '2020-11-27'
]);
