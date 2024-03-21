<?php
/**
 * DB정보 작성 및 PDO 객체 반환
 * 
 * @return PDO(클래스명) PDO객체
 */
function db_conn() {
    // DB접속 정보
    $dbHost     = "localhost"; //원래 아이피 주소, DB Host
    $dbUser     = "root"; //DB 계정명
    $dbPw       = "php505"; //DB 패스워드
    $dbName     = "employees"; //DB 명
    $dbCharset  = "utf8mb4"; //DB charset
    $dbDsn  = "mysql:host=".$dbHost.";dbname=".$dbName.";charset".$dbCharset; //dsn

    // PDO 옵션
    $opt = [
        // Prepared Statement로 쿼리를 준비할 때, PHP와 DB 어디에서 에뮬레이션 할지 여부를 결정
        PDO::ATTR_EMULATE_PREPARES      => false //DB에서 에뮬레이션 하게 설정
        // PDO에서 예외를 처리하는 방식을 지정
        ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION 
        // DB의 결과를 저장하는 방식을 지정 => FETCH_OBJ는 객체로 데이터 지정
        ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC //연상배열로 패치
    ];

    return new PDO($dbDsn, $dbUser, $dbPw, $opt); //DB연결문
}