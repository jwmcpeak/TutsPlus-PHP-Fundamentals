<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();
    

if (is_post()) {
    $term = sanitize($_POST['term']);
    $definition = sanitize($_POST['definition']);

    if (empty($term) || empty($definition)) {
        // TODO: display message
    } else {
        Data::add_term($term, $definition);
        redirect('index.php');
    }
}




view('admin/create');