<?php
// for 문
// 특정 처리를 반복해서 구현할때 사용하는 문법
for($i = 0; $i < 3; $i++) {
    // 반복할 처리
    echo $i."번째 루프\n";
}

// 시작 값이 0이고, 총 10번 도는 루프문을 만들어 주세요
for($i = 0; $i < 10; $i++ ) {
    // for에서 if와 break를 이용해서 특정 조건일때 멈출수 있다**
    if($i === 3) {
        // break : 루프를 종료하는 구문
        break;
    }
    echo $i."번째 루프\n";
}

// continue : continue 아래의 처리를 건너뛰고 다음루프로 진행
for($i = 0; $i < 10; $i++ ) {
    if($i === 3 || $i === 6 || $i === 9) {
        continue; //continue만나는 순간 밑에 식을 처리는 안하고 건너뛰고 다음 루프로 진행
    }
    echo $i."번째 루프\n";
}

// 배열 루프
$arr =[1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$loop_cut = count($arr);
for($i = 0; $i < $loop_cut; $i++) {
    echo $arr[$i];
}

// 다중루프
// 이중 for문은 변수 중복 하면 안된다 ***
for( $i = 1; $i < 3; $i++ ) {
    echo "1번 LOOP : ".$i."번째\n";
    for($z = 3; $z < 5; $z++) {
        echo "\t2번 LOOP : ".$z."번째\n";
    }
}

// 구구단 2단
$dan = 2;
// for($multi_num = 1; $multi_num < 10; $multi_num++) {
//     $msg_line = $dan. " X ".$multi_num." = ".($dan*$multi_num)."\n";
//     echo $msg_line;
// }

// 구구단
for($dan = 2; $dan <10; $dan++) {
    echo"** ".$dan."단 **\n";
    for($multi_num = 1; $multi_num < 10; $multi_num++) {
        $msg_line = $dan."X".$multi_num." = ".($dan * $multi_num);
        echo $msg_line."\n";
    }
}