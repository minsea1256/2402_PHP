<?php
// 중요한 반복문***
// foreach : 배열을 루프하는데 특화된 반복문, 배열의 길이만큼 루프
// $arr = [9,8,7,6,5];

// $val : 루프에 한 값을 저장을 위한 공간
// 배열의 값만 이용할 경우
// foreach($arr as $val) {
//     echo $val."\n";
// }

// 배열의 키와 값 모두 이용할 경우
// foreach($arr as $key => $val) {
//     echo "key : $key, value: $val\n";
// }
// 다중 데이터
// $arr = [
//     ["name" => "홍길동","age" => "20","gender" => "남자"]
//     ,["name" => "김소원","age" => "27","gender" => "여자"]
//     ,["name" => "갑돌이","age" => "24","gender" => "남자"]
// ];
// $itme에는 배열이 담긴다
// 현업에서 가장 많이 사용하는 식이다
// foreach($arr as $item) {
//     echo $item["name"]
//     ."의 나이는"
//     .$item["age"]
//     ."이고, 성별은"
//     .$item["gender"]
//     ."입니다.\n"
//     ;
// }
// // 단일 데이터
// $arr2 = [
//     "name" => "홍길동"
//     ,"age" => "20"
//     ,"gender" => "남자"
// ];

// 아래의 배열에서 foreach를 이용해 아래처럼 출력해 주세요.
// ID List
// meerkat1
// meerkat2
// meerkat3
// $tit = "ID List";
// $arr = [
// 	["id" => "meerkat1", "pw" => "php504"]
// 	,["id" => "meerkat2", "pw" => "php504"]
// 	,["id" => "meerkat3", "pw" => "php504"]
// ];

// echo $tit."\n";
// foreach($arr as $item) {
//     echo $item["id"]."\n";
// }

// 배열의 값중 가장 큰 수를 구해주세요.
// 예시)
// $arr = [4,5,7,3,2,9];
// 위의 배열 중 가장 큰  수인 9가 출력 되어야 합니다.
$arr = [4,5,7,10,3,2,9,-1,-99];
$max_num = 0;
$min_num = $arr[0];
foreach ($arr as $val){
    // 최대값 구하기
    if($max_num < $val){
        $max_num = $val;
    }
    // 최소값 구하기
    if($min_num > $val){
        $min_num = $val;
    }
}
echo $min_num;

