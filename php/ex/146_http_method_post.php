<?php
$id = isset($_POST["id"]) ? $_POST["id"] : "";
$pw = isset($_POST["pw"]) ? $_POST["pw"] : "";
print_r($_POST);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>로그인 하세요.</h1>
    <form action="/146_http_method_post.php" method="post">
        <input type="hidden" name="hidden" value="숨겨졌다.">
        <!-- 아이디 -->
        <label for="id">아 이 디</label>
        <input type="text" name="id" id="id">
        <!-- 비밀번호 -->
        <br>
        <label for="pw">비밀번호</label>
        <input type="password" name="pw" id="pw">
        <br>
        <label for="subwat">subWat</label>
        <input type="checkbox" name="chk[]" id="subwat" value="subwat">
        <label for="pan">빵</label>
        <input type="checkbox" name="chk[]" id="pan" value="빵">
        <label for="do">도삭면</label>
        <input type="checkbox" name="chk[]" id="do" value="도삭면">
        <br>
        <br>
        <label for="m">남자</label>
        <input type="radio" name="radio" id="m" value="남자">
        <label for="f">여자</label>
        <input type="radio" name="radio" id="f" value="여자">
        <br>
        <button type="submit">로그인</button>
        <?php
        if($id !== "") {
            echo "<h1>당신의 ID는 $id 입니다.</h1>";
        }
        if($pw !== "") {
            echo "<h1>당신의 PW는 $pw 입니다.</h1>";
        }
        ?>
    </form>
</body>
</html>