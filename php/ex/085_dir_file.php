<?php
// is_dir : 디렉토리 존재여부 체크
if(is_dir("./test")) {
    echo "이미 존재하는 디렉토리\n";
}
else {
    echo "없는 디렉토리\n";
    // 폴더(디렉토리) 생성
    // mkdir(생성할 경로, 퍼미션 설정 값);
    $result = mkdir("./test", 777);
    // 폴더(디렉토리) 생성 확인
    if($result) {
        echo "디렉토리 생성 성공\n";
    }
    else {
        echo "디렉토리 생성 실패\n";
    }
}

// 디렉토리 삭제
$result = rmdir("./test");
if($result) {
    echo "디렉토리 삭제 성공\n";
}
else {
    echo "디렉토리 삭제 실패\n";
}

// 디렉토리 열기 및 읽기
$open_dir = opendir("./"); //현재 파일 위치 전부 열기
while($item = readdir($open_dir)) {
    echo $item."\n";
}

// 디렉토리 닫기
closedir($open_dir);

// -------------

// 파일오픈
// a : 파일오픈 하면서 쓰기 전용으로 열면 파일이 생성된다 , 기존 내용(데이터) 보존
// 로그 찍는용으로 많이 사용했다, 옛날에는 파일 주고 받는용으로 사용했다
$file = fopen("./999_test.php", "a");
if($file) {
    echo "파일 오픈 성공\n";
    // 파일에 데이터 쓰기
    fwrite($file, "글쓰기 테스트 신기방기\n");

    // 파일 닫기
    fclose($file);
}
else {
    echo "파일 오픈 실패\n";
}

//파일 테스트 확인하는 다른 방법
fwrite(fopen("./999_test2.php", "a"), "글쓰기 테스트 신기방기\n"); 

// 파일삭제
unlink("./999_test.php");
