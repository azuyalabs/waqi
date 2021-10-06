<?php

use Azuyalabs\WAQI\WAQI;

require './src/WAQI.php';
require 'vendor/autoload.php';

$waqi = new WAQI('cfd51cba39ee7c55442ff8e77dac274cf8c3ae6b');


$waqi->getObservationByStation('yokosuka');
$r =  $waqi->getAQI();
\print_r($r);
