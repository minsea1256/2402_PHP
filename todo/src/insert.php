<?php
// 설정 정보
require_once( $_SERVER["DOCUMENT_ROOT"]."/config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리

// // GET 
// if(REQUEST_METHOD === "GET") {
//     // GET처리
// } 분기를 나누고 아무 처리없으면 지워져도 괜찮다
if(REQUEST_METHOD === "POST") {
    try {
        // 파라미터 획득
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 획득
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // content 획득

        // 파라미터 에러 체크
        $arr_err_param = [];
        if($title === "") {
            $arr_err_param[] = "title";
        }
        if($content === "") {
            $arr_err_param[] = "content";
        }
        if(count($arr_err_param) > 0) {
            //예외 처리
            throw new Exception("parameter Error : ".implode(", ", $arr_err_param));
        }

        // DB Connect
        $conn = my_db_conn(); // PDO 인스턴스
        
        // Tramsaction 시작
        $conn->beginTransaction();

        // 게시글 작성 처리
        $arr_param = [
            "title" => $title
            ,"content" => $content
        ];
        $result = db_insert_boards($conn, $arr_param);

        // 글 작성 예외처리
        if($result !== 1) {
            throw new Exception("Insert Boards count");
        }

        // 커밋
        $conn->commit();

        // 리스트 페이지로 이동
        header("Location: list.php");
        exit;
    } catch (\Throwable $e) {
        if(!empty($conn) && $conn->inTransaction()) {
            $conn->rollBack();
        }
        echo $e->getMessage();
        exit;
    }finally {
        if(!empty($conn)) {
            $conn = null;
        }
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
        <form action="./insert.php" method="post">
            <div class="line-content">
                <input type="text" name="title" id="title">
            </div>
            <div class="up-main-itme">
                <textarea name="content" id="text" cols="50" rows="5" spellcheck="false"></textarea>
            </div>
            <div class="insert-button">
                <a href="./list.php">취소</a>
                <button type="submit" class="a-button small-button">작성</button>
            </div>
        </form>
    </div>
</body>
</html> 