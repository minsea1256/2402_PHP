<?php
namespace lib;

class UserValidator {
    // (array $param_arr) 괄호안에 있는 문장은 개발자 실수를 줄이기 위해서 이다
    // static : 중복으로 사용할때 사용하면 좋다
    // UserValidator::chkValidator([]); 식으로 작성하면 작동된다
    public static function chkValidator(array $param_arr) {
        $arrErrorMag = []; // 에러 메세지 보관용
        

        // 패턴 생성
        $patternEmail = "/^[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}@[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}\.[a-zA-Z]{2,3}$/";
        $patterPassword = "/^[a-zA-Z0-9!@]{8,20}$/";
        $patternName = "/^[^ㄱ-ㅎ][가-힣]{1,20}$/";

        // 이메일 체크
        // array_key_exists() : 특정key가 있는지 없는지 체크한다 {
        if(array_key_exists("u_email", $param_arr)) {
            if(preg_match($patternEmail, $param_arr["u_email"], $matches) === 0) {
                $arrErrorMag[] = "이메일 형식이 맞지 않습니다.";
            }
        }
        // 패스워드 체크
        if(array_key_exists("u_pw", $param_arr)) {
            if(preg_match($patterPassword, $param_arr["u_pw"], $matches) === 0) {
                $arrErrorMag[] = "비밀번호는 영어 대소문자 및 숫자, 특수문자(!,@) 8~20 이하로 작성해주세요.";
            }
        }
        // 이름 체크
        if(array_key_exists("u_name", $param_arr)) {
            if(preg_match($patternName, $param_arr["u_name"], $matches) === 0) {
                $arrErrorMag[] = "이름은 한글만 1-50 이하로 입력해 주세요.";
            }
        }
        return $arrErrorMag;
    }
}