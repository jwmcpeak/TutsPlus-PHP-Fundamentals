<?php
session_start();
require('app/app.php');

if (is_user_authenticated()) {
    redirect('admin/');
}


if (is_post()) {
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password = sanitize($_POST['password']); // TODO: validate this!

  // compare with data store
  if (authenticate_user($email, $password)) {
    $_SESSION['email'] = $email;
    redirect('admin/');
  } else {
    $view_bag['status'] = "The provided crendentials didn't not work";
  }
  
  if ($email == false) {
    $view_bag['status'] = 'Please enter a valid email address';
  }
}


view('login');