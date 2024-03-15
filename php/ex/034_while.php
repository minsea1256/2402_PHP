<?php
// while 문
// while(조건) {}
$cnt = 0;
while($cnt < 3) {
    echo "count : $cnt \n";
    $cnt++;
}
$cnt = 0;
while(true) {
    $cnt++;
    if($cnt === 3) {
        break;
    }
}

// whlie문을 이용해서 구구단을 출력해 주세요.
$mine_num = 2;
while($mine_num < 10) {
    $num = 1; // 숫자를 초기화 후 다시 돌아가는 구조
    echo $mine_num."단\n";
    while($num< 10) {
        $cnt = $mine_num."x".$num."=".($mine_num*$num)."\n";
        echo $cnt;
        $num++;
    }
    $mine_num ++;
}