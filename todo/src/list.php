<?php
// 설정 정보
require_once( $_SERVER["DOCUMENT_ROOT"]."/config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리
$list_cnt = 6; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화
$btn_page_cnt = 3; //블럭 페이지 최대 표시 수

try {
    // DB Connect
    $conn = my_db_conn(); // connection 함수

    //파라미터에서 page 획득
    $page_num = isset($_GET["page"]) ? $_GET["page"] : $page_num;
    
    // 게시글 수 조회
    $result_board_cnt = db_select_boards_cnt($conn);
    
    // 페이지 관련 설정 셋팅
    $max_page_num = ceil($result_board_cnt / $list_cnt); // 최대 페이지 수
    $offset = $list_cnt * ($page_num -1); // 오프셋
    $prev_page_num = ($page_num -1) < 1 ? 1 : ($page_num -1); //이전 버튼 페이지 번호
    $next_page_num = ($page_num +1) > $max_page_num ? $max_page_num : ($page_num +1); //다음 버튼 페이지 번호

    // 페이징
    $start_page = ceil($page_num / $btn_page_cnt) * $btn_page_cnt -($btn_page_cnt - 1);
    $end_page = $start_page + ($btn_page_cnt - 1);
    $end_page = $end_page > $max_page_num ? $max_page_num : $end_page;


    // 게시글 리스트 조회
    $arr_param = [
        "list_cnt" => $list_cnt
        ,"offset" => $offset
    ];
    $result = db_select_boards_paging($conn, $arr_param);

    // 아이템 셋팅
    $item = $result[0];
    

} catch(\Throwable $e) {
    echo $e->getMessage();
    exit; //위에 코드가 오류 있을때 밑에 코드 안 보이고 종료 시키고 싶을때 사용
} finally {
    // PDO 파기
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
    <title>Todo List</title>
    <link rel="stylesheet" href="./css/todo.css">
</head>
<body>    
    <h1><a href="./list.php">TODO LIST</a></h1>
    <div class="header">
        <div class="main-button">
        <a href="./insert.php?no=<?php echo $item["no"]; ?>&page=<?php echo $page_num;?>" class="plus-button">+</a>    
        <a href="./list.php?page=<?php echo $prev_page_num ?>" class="a-button">이전</a>
        <?php
            for($num = $start_page; $num <= $end_page; $num++){
            // for($num = 1; $num <= $max_page_num; $num++){
        ?>
        <a href="./list.php?page=<?php echo $num ?>" class="a-button <?php echo $num == $page_num  ? "now_page_color" : ""; ?>"><?php echo $num ?></a>
        <?php
            } 
        ?>
        <a href="./list.php?page=<?php echo $next_page_num ?>" class="a-button">다음</a>
        </div>
    </div>
    <div class="main" style="background-image: url('./img/lattice.png');">
        <?php
            foreach($result as $item) {
        ?>
        <div class="main-itme">
            <div class="num-item">
                <p class="main-date"><?php echo $item["created_at"] ?></p>
                <div class="numder"><?php echo $item["no"] ?></div>
            </div>
            <div class="itme-button">
                <form action="./list.php" method="post">
                    <input type="checkbox" id="chk_info <?php echo $item["no"];?>">
                    <label for="chk_info <?php echo $item["no"];?>"></label>
                </form>
                <div class="itme-button-a"><a href="./update.php?no=<?php echo $item["no"] ?>&page=<?php echo $page_num ?>"><?php echo $item["title"] ?></a></div>
                <a href="./delete.php?no=<?php echo $item["no"];?>&page=<?php echo $page_num; ?>" class="itme-button-left">삭제</a>
                <a href="./update.php?no=<?php echo $item["no"];?>&page=<?php echo $page_num; ?>" class="itme-button-right">수정</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>