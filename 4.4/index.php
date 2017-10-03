<?php

require('app/app.php');

$view_bag = [
    'title' => 'Glossary List'
];

view('index', get_terms());