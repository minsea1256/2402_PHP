<?php

require_once('./mammal/Whale.php');
require_once('./mammal/ooptaxt.php');
require_once('./Swimm.php');
require_once('./Breath.php');
require_once('./fish/Saba.php');

use inf\Breath;
use inf\Swimm;
use mammal\Whale;
use mammal\FlyingFish;
use fish\Saba;

$WhaleInstance = new Whale('고래');
$WhaleInstance ->seimming();

$flyingSquirrelInstance = new FlyingFish('날다람쥐');
$flyingSquirrelInstance ->printRegidence();

$sabaInstance = new Saba('고등어');

test($WhaleInstance);

function test(Swimm $instance) {
    $instance->seimming();
}
