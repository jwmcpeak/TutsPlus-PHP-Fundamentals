<?php

session_start();
require('../app/app.php');

ensure_user_is_authenticated();

if (is_get()) {
    $key = sanitize($_GET['id']);

    if (empty($key)) {
        view('not_found');
        die();
    }

    $term = $config['provider']->get_term($key);

    if ($term === false) {
        view('not_found');
        die();
    }

    view('admin/edit', $term);
}

if (is_post()) {
    $term = sanitize($_POST['term']);
    $definition = sanitize($_POST['definition']);
    $id = sanitize($_POST['id']);

    if (empty($term) || empty($definition) || empty($id)) {
        // TODO: display message
    } else {
        $config['provider']->update_term($id, $term, $definition);
        redirect('index.php');
    }
}