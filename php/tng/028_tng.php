<?php
// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****
for($ster = 0 ; $ster < 5; $ster++) {
    echo "*****\n";
}

// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****
for($ster = 0; $ster < 6; $ster++){
    for($ster_r = 0;$ster_r < 6; $ster_r++){
        if($ster_r<$ster){
        echo "*";
        }
    }
    echo "\n";
}

// 아래처럼 별을 찍어주세요.
// 예시)
//     *
//    **
//   ***
//  ****
// *****

for($ster = 0; $ster < 6; $ster++){
    for($ster_l = 5;$ster_l >= 0; $ster_l--){
        if($ster_l<$ster){
        echo "*";
        }
        else{
        echo " ";
        }
    }
echo "\n";
}

for($i = 1; $i < 6; $i++) {
  for($j = 1; $j < 6-$i; $j++) {
    echo "*";
  }
  for($k=1; $k < $i-1; $k++) {
    echo " ";
  }
  echo "\n";
}
