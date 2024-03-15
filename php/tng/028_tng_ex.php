<?php
// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****
for( $i = 0; $i < 5; $i++ ) {
    echo "*****\n";
}

// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****
for( $i = 0; $i < 5; $i++ ) {
    for( $z = 0; $z <= $i; $z++ ) {
        echo"*";
    }
    echo"\n";
}

// 아래처럼 별을 찍어주세요.
// 예시)
//     *
//    **
//   ***
//  ****
// *****
$num = 5;
for($i = 1; $i <= $num; $i++ ) {
    $cnt_space = $num - $i;
    // for문 1개 + if문으로 별 찍기
    for($z = 1; $z <= $num; $z++) {
        if($z <= $cnt_space) {
            echo " ";
        }
        else {
            echo "*";
        }
    }
    echo "\n";
}

for($i = 0; $i < $num; $i++){
    for($z =$num-1; $z >= 0; $z--){
        if($z <= $i){
        echo "*";
        }
        else{
        echo " ";
        }
    }
echo "\n";
}

for( $i = 0; $i < $num; $i++) {
    // for문 2개 이용
    // 공백찍는 for문
    for($z = 1; $z < $num-$i; $z++) {
        echo " ";
    }
    // 별찍는 for문
    for($y = 0; $y <= $i; $y++) {
        echo "*";
    }
    echo "\n";
}