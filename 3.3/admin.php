<?php
session_start();
require_once('./../inc/config.php');
require_once('./../inc/functions.php');

ensure_user_is_authenticated();

echo $_SESSION['email'];