<?php

require('functions.php');

$title = 'hello, model';

$view_bag = [];

$view_bag['title'] = 'This is the Title';


view('index', $title);