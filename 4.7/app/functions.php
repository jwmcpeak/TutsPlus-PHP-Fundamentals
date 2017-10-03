<?php

function redirect($url) {
    header("Location: $url");
    die();
}

function view($name, $model = '') {
    global $view_bag;
    require(APP_PATH . "views/layout.view.php");
}

function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function sanitize($value) {
    $temp = filter_var(trim($value), FILTER_SANITIZE_STRING);

    if ($temp === false) {
        return '';
    }

    return $temp;
}