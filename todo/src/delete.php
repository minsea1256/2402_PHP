<?php
// 설정 정보
require_once( $_SERVER["DOCUMENT_ROOT"]."/config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리

try {
        // DB Connect
        $conn = my_db_conn(); //PDO 인스턴스 생성 

        // Method 체크
        if(REQUEST_METHOD === "GET") {

        // 게시글 데이터 조회
        // 파라미터 획득
        $no = isset($_GET["no"]) ? $_GET["no"] : ""; //no획득
        $page = isset($_GET["page"]) ? $_GET["page"] : ""; //page획득

        // 파라미터 예외처리
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
    }
    else if(REQUEST_METHOD === "POST") {
        // 파라미터 획득
        $no = isset($_POST["no"]) ? $_POST["no"] : "" ;
        
        // 파라미터 예외처리
        $arr_err_param = [];
        if($no === "") {
            $arr_err_param[] = "no";
        }
        if(count($arr_err_param) > 0) {
            throw new Exception("parameter Error : ".implode(", ", $arr_err_param));
        }

        // Transaction 시작
        $conn->beginTransaction();

        // 게시글 정보 삭제
        $arr_param = [
            "no" => $no
        ];
        $result = db_delete_boards_no($conn, $arr_param);

        // 삭제 예외 처리
        if($result !== 1) {
            throw new Exception("Delete Boards no count");
        }
        // commit
        $conn->commit();

        // 리스트 페이지로 이동
        header("Location: list.php");
        exit;
    }
    
} catch (\Throwable $e) {
    if(!empty($eonn) && $conn->inTransaction()) {
        $conn->rollBack();
    }
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
        <form action="./delete.php" method="post">
            <div class="de-main-itme">
                <p class="blink">삭제 하시겠습니까?</p>
            </div>
            <div class="up-main-itme">
                <div class="num-item">
                    <p class="main-date"><?php echo $item["created_at"]; ?></p>
                    <div class="numder"><?php echo $item["no"] ?></div>
                </div>
                <textarea name="content" id="text" cols="50" rows="5" spellcheck="false" readonly><?php echo $item["content"] ?></textarea>
            </div>
            <div class="insert-button">
                <input type="hidden" name="no" value="<?php echo $no; ?>">
                <a href="./list.php">취소</a>
                <button type="submit" class="a-button small-button">삭제</button>
            </div>
        </form>
    </div>
</body>
</html> 