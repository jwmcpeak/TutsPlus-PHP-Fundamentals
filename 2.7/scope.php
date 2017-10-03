<?php
    $title = 'scope';

    $guitars = [
      ['name' => 'Vela', 'manufacturer' => 'PRS'],
      ['name' => 'Explorer', 'manufacturer' => 'Gibson'],
      ['name' => 'Strat', 'manufacturer' => 'Fender']
    ];

    //$guitar_names = array_column($guitars, 'name');

    function pluck($arr, $key) {
      $result = array_map(function($item) use($key) {
        return $item[$key]; 
      }, $arr);

      return $result;
    }

    $guitar_names = pluck($guitars, 'name');



    // $greeting = 'hello, world'; //global

    // function sum($a, $b) {
    //   global $greeting;
    //   echo $greeting;
    //     $result = $a + $b;

    //     return $result;
    // }
    
    // $result = sum(1, 2);

    function output($value /*= ''*/) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }

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
        output($guitar_names);
      ?>
      </div>
    </div>
  </body>

</html>