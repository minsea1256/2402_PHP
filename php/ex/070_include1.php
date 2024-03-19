<?php
// include 불러오는 파일이 우선순위에 있어야 한다, 오류 발생 시 프로그램을 정지하지 않고 처리 진행한다
//  여러번 불려올수 있다 하지만 여러파일 불려오면 오류 발생할수 있어서 한파일만 불려와야한다
// include_once 딱 한개만 불려오게 해준다
// include("./070_include2.php");
include_once("./070_include2.php");
include_once("./070_include2.php");
include_once("./070_include2.php");

// echo my_sum(1, 2);