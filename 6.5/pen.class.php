<?php

class Pen {
    function __construct($ink_color) {
        $this->ink_color;
    }
    
    public function write($message) {
        echo $message;
    }
}

class PenWithCap extends Pen {
    public function toggleCap() {

    }
}

class RetractablePen extends Pen {
    public function togglePoint() {

    }

    public function write($message) {
        return 'written with retractable pen:' . $message; 
    }
}

$cappedPen = new PenWithCap('black');
$cappedPen->toggleCap();
$cappedPen->write('asdf');
$cappedPen->toggleCap();

$rectPen = new RetractablePen('blue');
$rectPen->togglePoint();
$rectPen->write('asdf');
$rectPen->togglePoint();

