<?php

return [

    'paths' => ['api/*', 'productos', '*'],  // Agrega aquí las rutas que requieran CORS

    'allowed_methods' => ['*'],  // Permitir todos los métodos HTTP

    'allowed_origins' => ['http://localhost:4200'],  // Agrega el dominio de tu aplicación Angular

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],  // Permitir todos los headers

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];

