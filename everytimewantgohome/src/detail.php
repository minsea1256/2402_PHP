<?php
require_once( $_SERVER["DOCUMENT_ROOT"]."/config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리

$list_cnt = 100; // 한 페이지 최대 표시 수

//리스트 날짜 url에서 가져오기
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');


//현재날짜 가져오기
$current_date = date('Y-m-d');

// 이전 날짜 계산 (하루 전)
$previous_date = date('Y-m-d', strtotime($date . ' -1 day'));

// 다음 날짜 계산 (하루 후)
$next_date = date('Y-m-d', strtotime($date . ' +1 day'));



try {
    //DB connect
    $conn = my_db_conn();

    // 게시글의 번호를 가져온다
    $no = isset($_GET["no"]) ? ($_GET["no"]) : "";

    //파라미터 에러 체크
    $arr_err_param = [];
    if($no === "") {
        $arr_err_param[] = "no";
    }

    if(count($arr_err_param) > 0 ) {
        throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
    }

    $arr_param = [
        "no" => $no
    ];
    $result = db_select_boards_no($conn, $arr_param);

    if(count($result) !== 1) {
        throw new Exception("Select Boards no count");
    }

    $item = $result[0];

    // 이미지 불러오는 함수
    $img_result = db_select_name_img($conn);
    $img = $img_result[0]["avatar"];


} catch (\Throwable $e) {
    echo $e->getMessage();
    exit;
}finally {
    //PDO파기
    if(!empty($conn)) {
        $conn = null;
    }
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/detail.css">
    <link rel="shortcut icon" href="./image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./image/favicon.ico" type="image/x-icon">
    <title>Detail</title>
</head>
<body>
    <a href="./main01.php"><div class="header">PIXEL FOREST</div></a>
    <div class="main">
        <div class="main_top">
            <!-- 오늘 날짜 -->
            <div class="top_date">NOW DATE :<?php echo $current_date ?></div>
            <div class="minus">-</div>
            <div class="square">ㅁ</div>
            <div class="back"><a href="./list.php?date=<?php echo $date?>">x</a></div>
        </div>
        <div class="main_mid">
            <div class="main_left">
                <form action="./detail.php" method="get">
                    <div class="main_left_button">
                        <!-- <button type="submit">Update</button> -->
                        <div class="main_left_button01"><a href="./update.php?date=<?php echo $date?>&no=<?php echo $item["no"]?>">Update</a></div>
                        <div class="main_left_button02"><a href="./list.php?date=<?php echo $date?>">Cancel</a></div>
                        <div class="main_left_button03"><a href="./delete.php?date=<?php echo $date?>&no=<?php echo $item["no"]?>">Delete</a></div>
                    </div>
                    <div class="main_left_item">
                        <input type="text" name="title" id="title" spellcheck="false" readonly value="<?php echo $item["title"] ?>">
                        <textarea name="content" id="content" cols="40" rows="13" spellcheck="false" readonly><?php echo $item["content"] ?></textarea>
                    </div>
                </form>
            </div>
            <div class="main_right">
                <img src="<?php echo $img ?>" alt=""class="img_p">
                <!-- 리스트 날짜 -->
                <div class="nick_date_item"><?php echo $date ?></div>
            </div>
        </div>
    </div>
</body>
</html>