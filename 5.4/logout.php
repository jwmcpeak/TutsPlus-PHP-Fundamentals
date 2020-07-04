<?php

session_start();
session_unset();
session_destroy();

require('app/app.php');


redirect('login.php');