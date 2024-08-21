<?php
namespace fish;

require_once('./Swimm.php');
require_once('./Breath.php');

use inf\Breath;
use inf\Swimm;
// 개발자가 실수를 줄이기 위한 용도로 많이 사용한다
// implements 여러게 인터페이스 연결할 수 있으면 연결할때 콤마 붙여주면 된다
class Saba implements Swimm, Breath {
    private string $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function seimming() {
        echo $this->name."가 헤엄칩니다.";
    }

    public function breath() {
        echo $this->name."는 아가미 호흡 합니다.";
    }
}