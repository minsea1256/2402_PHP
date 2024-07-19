<?php
namespace mammal;

require_once('./Swimm.php');
require_once('./mammal/Mammal.php');
use Mammal\mammal;
use inf\Swimm;

class Whale extends Mammal implements Swimm {

    public function printRegidence() {
        echo $this->name."는 바다에 삽니다.";
    }

    public function seimming() {
        echo $this->name."가 헤엄칩니다.";
    }
    
}