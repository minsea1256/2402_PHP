<?php
// 상속 : 부모클래스의 자원을 자식클래스가 물려받아 사용하거나 재정의 하는것
// 이중 상속은 금지하고 있다
class Parents {
    protected $name; //공동 데이터를 상위클래스로 보내고 자식클래스에서 데이터 사용할때 사용한다

    public function __construct() {
        echo "부모클래스 생성자 실행 \n";
    }
    private function home() {
        echo "집은 부모님 겁니다";
    }
    public function car() {
        echo "자동차 부모님 자식 다 씁니다.\n";
    }
}
class Child extends Parents {
    // 자식쪽에서 새롭게 오버라이딩 했다
    public function __construct($name) {
        $this->name = $name;
        echo "자식 클래스 생성자 실행 \n";
    }
    public function dog() {
        echo "강아지는 제겁니다.\n";
    }

    // 오버라이딩 : 부모클래스에서 동일한 데이터 자식이 물려받을때 사용
    public function car() {
        echo "이 자동차는 이제 제겁니다.\n";
    }

    Public function getName() {
        echo $this->name;
    }
}

$obj = new Child("홍길동");
$obj->car();
$obj->getName();



