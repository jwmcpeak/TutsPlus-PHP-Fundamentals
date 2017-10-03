<?php

$config = [
    //'data_file' => APP_PATH . 'data.json',
    'provider' => new FileDataProvider(APP_PATH . 'data.json'),
    'users' => [
        'admin@admin.com' => '1234'
    ]
];