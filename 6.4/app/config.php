<?php

$config = [
    //'data_file' => APP_PATH . 'data.json',
    //'provider' => new FileDataProvider(APP_PATH . 'data.json'),
    'provider' => new MySqlDataProvider(),
    
    'users' => [
        'admin@admin.com' => '1234'
    ]
];