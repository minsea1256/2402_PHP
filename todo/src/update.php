<?php
// 설정 정보
require_once( $_SERVER["DOCUMENT_ROOT"]."/config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리
try {
    // DB Connect
    $conn = my_db_conn(); //PDO 인스턴스 생성

    // 게시글 데이터 조회
    // 파라미터 획득
    $no = isset($_GET["no"]) ? $_GET["no"] : ""; //no획득
    $page = isset($_GET["page"]) ? $_GET["page"] : ""; //page획득
    
    $arr_err_param = [];
    if($no === "") {
        $arr_err_param[] = "no";
    }
    if($page === "") {
        $arr_err_param[] = "page";
    }
    if(count($arr_err_param) > 0) {
        throw new Exception("parameter Error : ".implode(", ", $arr_err_param));
    }

    // 게시글 정보 획득
    $arr_param = [
      "no" => $no
    ];
    $result = db_select_boards_no($conn, $arr_param);
    if(count($result) !==1 ) {
        throw new Exception("Select Boards no count");
    }

    // 아이템 셋팅
    $item = $result[0];

} catch (\Throwable $e) {
    echo $e->getMessage();
    exit;
} finally {
  // PDO 파기
  if(!empty($eonn)) {
    $conn = null;
  }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수정 페이지</title>
    <link rel="stylesheet" href="./css/todo.css">
</head>
<body>
    <h1><a href="./list.php">TODO LIST</a></h1>
    <div class="up-main" style="background-image: url('./img/lattice.png');">
        <?php
            foreach($result as $item) {
        ?>
        <div class="line-content">
            <input type="text" name="title" id="title" value="<?php echo $item["title"]; ?>">
        </div>
        <div class="up-main-itme">
            <div class="num-item">
                <p class="main-date"><?php echo $item["created_at"] ?></p>
            </div>
            <textarea name="text" id="text" cols="50" rows="5" spellcheck="false"></textarea>
        </div>
        <div class="up-button">
            <a href="./list.php?no=<?php echo $item["no"] ?>&page=<?php echo $page_num ?>">취소</a>
            <a href="./list.php?no=<?php echo $item["no"] ?>&page=<?php echo $page_num ?>">확인</a>
            <a href="./delete.php">삭제</a>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html> 