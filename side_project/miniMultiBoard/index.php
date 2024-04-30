<?php
require_once("config.php"); // 설정 파일 불러오기
require_once("autoload.php"); // 오토로드 호출

new router\Router(); // 라우터 호출 - 특정 역활에 따라 연결해준다
