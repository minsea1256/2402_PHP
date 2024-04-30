<?php
spl_autoload_register(function($path) {
    // "\" -> "/" 로 변경
    $path = str_replace("\\", "/", $path); // \ 이스케이프로 역슬래시 뒤로 문자를 넣으면 그 문자를 찾는다
    require_once($path.".php");
}); // 클로져