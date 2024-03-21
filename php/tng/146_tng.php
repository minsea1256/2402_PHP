<?php
$id = isset($_GET["q"]) ? $_GET["q"] : "";
$pw = isset($_GET["w"]) ? $_GET["w"] : "";
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
    <form action="/146_tng.php" method="get">
        <!-- 아이디 -->
        <label for="input_id">아 이 디</label>
        <input type="text" name="q" id="input_id">
        <!-- 비밀번호 -->
        <br>
        <label for="input_pw">비밀번호</label>
        <input type="password" name="w" id="input_pw">
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