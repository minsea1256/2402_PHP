<?php
// try, catch, finally
try {
    // 예외가 발생할 로직을 작성
    $i = 5 / 0;
}
// $e = 변수명
// catch문 여러문단 사용해도 가능하다 비슷한게 if문이랑 비슷하다
catch(Throwable $e) {
    // 예외가 발생했을 때 처리를 작성
    // $e->getMessage() : 예외처리 후 오류메세지 확인하는 메소드
    // 예외처리 인터페이스 계층이 낮은것 부터 우선순위로 배치해야한다
    echo "예외 발생 : ".$e->getMessage()."\n";
}
finally {
    // 예외 발생 여부와 상관없이 무조건 마지막 실행
    // finally는 생략 가능
    echo "finally \n";
}

echo "계산 완료";
