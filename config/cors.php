<?php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'storage/*'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],  
    'allowed_origins' => [
        'http://localhost:*',  
        'http://127.0.0.1',
        'http://127.0.0.1:8000', 
    ],
    'allowed_headers' => ['*'],  
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,  
];
