<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        //configurações do BD
        'db' => [
            'driver'     => 'mysql',
            'host'       => 'localhost',
            'database'   => 'slim_api',
            'username'   => 'root',
            'password'   => '',
            'charset'    => 'utf8',
            'collation'  => 'utf8_unicode_ci',
            'prefix'     => '',
        ],

        //secret
        'secretKey' => '29afbdd38473f407f1e469ecd7af5e1d3ecdaf05'

    ],
];
