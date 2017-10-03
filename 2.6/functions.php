<?php
    $title = 'functions';

    function sum($a, $b) {
        $result = $a + $b;

        return $result;
    }
    $result = sum(1, 2);

    function output($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }

    $guitars = [
        'Vela',
        'Explorer',
        'Strat'
    ];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PHP Fundamentals: <?= $title; ?></title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/php-fundamentals.css" rel="stylesheet" />
  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">PHP Fundamentals: <?= $title; ?></a>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5"></h1>
        </div>
      </div>
      <div class="row">
      <?php 
        output($guitars);
      ?>
      </div>
    </div>
  </body>

</html>