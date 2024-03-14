<?php
// switch : 간단한 답면 사용하면 좋다 복잡한 식은 switch문 보다 if문으로 사용하는게 효율이 좋다 , 특정요소를 치환하는 경우가 많다
// php는 조건 연산자가 들어가지만 가독성이 떨어져서 왠만하면 안 사용한다
$food = "햄버거";
switch($food){
    case "김밥":
        // 처리
        echo "한식";
        break; //스위치문 멈추고 싶으면 break를 넣어서 멈춘다
    case "피자":
    case "햄버거":
        echo "양식";
        break; //스위치문 멈추고 싶으면 break를 넣어서 멈춘다
    default:
        echo "기타";
        break; //default에 꼭 넣을 필요는 없지만 양식상 넣어준다
}

// switch를 이용하여 작성
// 1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상, 그 외는 노력상
// 을 출력해 주세요.
$rank = 1; //값을 넣는 곳
switch($rank){
    case 1:
        echo "금상";
        break;
    case 2:
        echo "은상";
        break;
    case 3:
        echo "동상";
        break;
    case 4:
        echo "장려상";
        break;
    default:
        echo "노력상";
        break;
}

// switch문을 if문으로 변경
if( $rank  === 1) {
    echo "$rank 등 금상";
}
else if ($rank  === 2) {
    echo "$rank 등 은상";
}
else if ($rank  === 4) {
    echo "$rank 등 동상";
}
else if ($rank  === 4) {
    echo "$rank 등 장려상";
}
else {
    echo "$rank 등 노력상";
}
