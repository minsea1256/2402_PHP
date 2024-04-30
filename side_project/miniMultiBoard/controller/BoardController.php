<?php
namespace controller;
class BoardController extends Controller {
    // 게시글 리스트
    // protected 부모에게 접근해야하고 캡슐화로 인해 사용했다
    protected function listGet() {
        return "boardList.php";
    }
}