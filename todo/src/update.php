<?php
// 설정 정보
require_once( $_SERVER["DOCUMENT_ROOT"]."/config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리

try {
    // DB Connect
    $conn = my_db_conn(); //PDO 인스턴스 생성

    if(REQUEST_METHOD === "GET") {
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

    } else if(REQUEST_METHOD === "POST") {
        // 파라미터 획득
        $no = isset($_POST["no"]) ? $_POST["no"] : ""; //no 획득
        $page = isset($_POST["page"]) ? $_POST["page"] : ""; //page 획득
        $title = isset($_POST["title"]) ? $_POST["title"] : ""; //title 획득
        $content = isset($_POST["content"]) ? $_POST["content"] : ""; //content 획득

        // 파라미터 예외처리
        $arr_err_param = [];
        if($no === "") {
            $arr_err_param[] = "no";
        }
        if($page === "") {
            $arr_err_param[] = "page";
        }
        if($title === "") {
            $arr_err_param[] = "title";
        }
        if($content === "") {
            $arr_err_param[] = "content";
        }
        if(count($arr_err_param) > 0) {
            throw new Exception("parameter Error : ".implode(", ", $arr_err_param));
        }

        // Transaction 시작
        $conn->beginTransaction();

        // 게시글 수정 처리
        $arr_param = [
            "no" => $no
            ,"title" => $title
            ,"content" => $content
        ];
        $result = db_update_boards_no($conn, $arr_param);

         // 삭제 예외 처리
        if($result !== 1) {
            throw new Exception("Update Boards no count");
        }
        // commit
        $conn->commit();

        // 상세 페이지로 이동
        header("Location: list.php?no=".$no."&page=".$page);
        exit;
    }

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
        <form action="./update.php" method="post">
        <input type="hidden" name="no" value="<?php echo $item["no"]; ?>">
        <input type="hidden" name="page" value="<?php echo $page; ?>">
            <?php
                foreach($result as $item) {
            ?>
            <div class="line-content">
                <input type="text" name="title" id="title" value="<?php echo $item["title"]; ?>">
            </div>
            <div class="up-main-itme">
                <div class="num-item">
                    <p class="main-date"><?php echo $item["created_at"]; ?></p>
                    <div class="numder"><?php echo $item["no"]; ?></div>
                </div>
                <textarea name="content" id="text" cols="50" rows="5" spellcheck="false"><?php echo $item["content"]; ?></textarea>
            </div>
            <?php
                }
            ?>
            <div class="up-button">
                <a href="./list.php?page=<?php echo $page; ?>" class="a-button small-button">취소</a>
                <button type="submit" class="a-button small-button" >완료</button>
                <a href="./delete.php?no=<?php echo $no; ?>&page=<?php echo $page; ?>" class="a-button small-button">삭제</a>
            </div>
        </form>
    </div>
</body>
</html> 