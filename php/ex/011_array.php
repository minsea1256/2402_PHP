<?php
// 배열 (array) : 하나의 변수에 여러게의 값을 담을 수 있는 데이터 타입
// echo는 문자열로 변경해서 출력하는데 배열 (array)은 문자열로 변경이 안된다 그래서 echo로 출력이 안된다
$arr1 = array(1, 2, 3); //5.4버전 이전에 배열을 선언하던 방식
print_r($arr1);
// $arr2 = [배열 : 방번호 or key or index 라고 한다]; 
$arr2 = [4, 5, 6]; //5.4버전에 추가된 배열 선언 방식, 속도가 빠르고 간결하다 <-- 현업에서 사용
print_r($arr2);

// 배열에서 특정 요소(item)의 값 획득
// echo로 출력이 안돼서 특정 요소의 값을 지정해서 출력한다
// echo $arr2[방번호 or key or index];
echo $arr2[2];

// 배열에 요소(item) 추가
// index번호는 자동으로 늘어난다
$arr2[] = 100;
print_r($arr2);

// 배열의 특정 요소의 값 변경 = 새로운 값을 대입한다
$arr2[2] = 10;
print_r($arr2);

// 음식종류 5개 이상을 인덱스 배열로 만들어주세요.
$arr_menu = [
        "불고기"
        ,"돈까스"
        ,"쫄면"
        ,"라면"
        ,"김밥"
        ,"커피"
    ];

// 또다른 방법의 식
$arr_menu[] = "햄버거";
$arr_menu[] = "핫도그";
print_r($arr_menu);

echo $arr_menu[5];

// 연관 배열 or 연산 배열 : Key를 지정할수 있다
$arr_asso =  [
    "name" => "김소원"
    ,"age" => 27
];
print_r($arr_asso);
echo $arr_asso["name"];

// $arr_asso 키(gender), 값(여자)인 아이템을 추가
$arr_asso["gender"] = "여자";
print_r($arr_asso);

// 다차원 배열 : 방번호를 지정해서 위에서 부터 순서대로 찾으면 된다
$arr_mlti = [
  [1, 2, 3]
  ,[
    4
    , [10, 11, 12]
    , 6
    ]
  ,7
];
echo $arr_mlti[0][1];
echo $arr_mlti[1][2];
echo $arr_mlti[2];
echo $arr_mlti[1][1][1];


$arr_result =  [
    ["name" => "김소원", "age" => 27]
    ,["name" => "권민서", "age" => 26]
    ,["name" => "홍길동", "age" => 15]
];
echo $arr_result[1]["name"];
echo $arr_result[2]["age"];
echo "\n";

// 배열의 길이 : itme의 갯수
$arr = [1,2,3,4,5];
echo count($arr);

echo count($arr_result[0]); // <-- 다차원 배열 안에 itme 갯수

// unset() : 배열의 특정 아이템 삭제 하는 함수
// 주의 : 키는 정렬되지는 않음 , 선택한 요소만 삭제
unset($arr[2]);
print_r($arr);

// 배열의 정렬 : itme이 많으면 시간이 오래걸러서 잘 안 사용한다
// asort() : 배열의 값을 기준으로 오름차순 정렬
// 제정의 : 이전에 사용했던 요소를 다시 정의하는 뜻
$arr = [5,4,6,2,7];
asort($arr);
print_r($arr);
// arsort() : 배열의 값을 기준으로 내림차순 정렬
arsort($arr);
print_r($arr);

// ksort() : 배열의 키를 기준으로  오름차순 정렬
ksort($arr);
print_r($arr);

// krsort() : 배열의 키를 기준으로 내림차순 정렬
krsort($arr);
print_r($arr);



// 키는 요리명, 값은 주재료 하나로 이루어진 배열을 만들어주세요.(배열 길이는4)
$arr_cook = [
    "김치찌개" => "김치"
    ,"돈까스" => "돼지고기"
    ,"미역국" => "미역"
    ,"피자" => "치즈"
];
$arr_cook["피자"] = ["치즈","밀가루","토마토","바질"];
print_r($arr_cook);