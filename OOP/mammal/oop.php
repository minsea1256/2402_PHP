<?php
class Mammal {
    protected $name;
    protected $residence;

    // 생성자 = 최초에 한번 실행하는 특수 메소드
    // [public function __construct() 고정 값이다]
    // 객체지항에서 type int [예 : string] 정말 중요하다!
    public function __construct(string $name, string $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }
    // final은 부모에게 정의했는데 자식쪽에서 정의하다가 변경하면 안돼는 메소드에 붙혀준다
    final public function breath() {
        echo $this->name."는 폐호흡을 합니다.";
    }
}

// extends 상속받을 때 사용한다
class whale extends Mammal{
    // 자식에게 오버라이딩 하면 부모요소가 실행이 안된다 이따 부모요소 사용하는 방법은 : parent 넣어준다
    public function __construct() {
        echo "고래 클래스 입니다. \n";
        parent::__construct("고래", "바다");
    }
    public function swimming() {
        echo $this->name."는 헤엄을 칩니다.";
    }
    // public function breath() {
    //     // 부모에 메소드를 자식쪽에서 다시 제정의로 객체의 다향성 이다 [오버라이딩]
    //     echo $this->name."는 페호흡을 하고 숨을 잘 참습니다. \n그리고 ".$this->residence."살고 있습니다.";
    // }
}

class FlyingSquirrel extends Mammal{
    public function flying() {
        echo $this->name."는 날아 갑니다.";
    }
}

// $WhaleInstance 여기에는 new Whale()이라는 주소가 담긴다
$WhaleInstance = new Whale(); // 인스턴스화

$WhaleInstance->breath();


