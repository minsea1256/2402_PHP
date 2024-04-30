<?php
namespace controller;

class Controller {
    // 생성자
    public function __construct($action) {
        // 세션 시작 [세션 : 유저가 로그인 했는지 안 했는지]
        if(!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크
        // TODO : 나중에 추가

        // 해당액션[action] 호출 - 자식이 가지고있는 액션 호출
        $resultAction = $this->$action();

        // view 호출
        // TODO : 나중에 로케이션 처리도 되도록 수정
        require_once("view/".$resultAction);

        exit; // php 처리 종료
    }
}