<?php
namespace controller;
use model\UsersModel;
use lib\UserValidator;

class UserController extends Controller {
    private $arrUserList = []; // 유저 정보

    // getter 유저 정보
    public function getUserInfo($key) {
        return $this->arrUserList[$key];
    }

    // 로그인 페이지로 이동
    protected function loginGet(){
        return "login.php";
    }

    // 로그인 처리
    protected function loginPost() {
        // 유저 입력 정보 획득
        $requestData = [
            "u_email" => $_POST["u_email"]
            ,"u_pw" => $_POST["u_pw"]
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "login.php";
        }

        // 유효성 체크 후 문제가 없으면 비밀번호 암호화를 실행한다
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $requestData["u_email"]);

        // 유저정보 획득
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($requestData);

        // 유저 존재 유무 체크
        if(empty($resultUserInfo)) {
            // 에러메세지 
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";

            return "login.php";
        }

        // 세션에 u_id 저장
        // 세션[웹서버에 데이터를 저장]
        $_SESSION["u_id"] = $resultUserInfo["u_id"];

        // 로케이션 처리
        // TODO : 나중에 보드 리스트 게시판 타입 수정할때 같이 수정
        return "Location: /board/list";
    }
    // 로그아웃 처리
    protected function logoutGet() {
        // session_unset(); // 해당키만 없애는것
        session_destroy(); // 세션 전체를 없애는거
        return "Location: /user/login";
    }

    // 회원가입 페이지 이동
    protected function registGet() {
        return "regist.php";
    }

    // 회원 가입 처리
    protected function registPost() {
        $requestData = [
            "u_email"  => $_POST["u_email"]
            ,"u_pw"    => $_POST["u_pw"]
            ,"u_name"  => $_POST["u_name"]
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "regist.php";
        }

        // 유효성 체크 후 문제가 없으면 비밀번호 암호화를 실행한다
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $requestData["u_email"]);

        // 이메일 중복 체크
        $selectData=[
            "u_email" => $requestData["u_email"]
        ];
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($selectData);
        if(count($resultUserInfo) > 0) {
            $this->arrErrorMsg = ["이미 가입한 회원입니다."];
            return "regist.php";
        }

        // 회원 정보 인서트 처리
        $modelUsers->beginTransaction();
        $resultUserInsert = $modelUsers->addUserInfo($requestData);
        if($resultUserInsert === 1) {
            $modelUsers->commit();
        }else {
            $modelUsers->rollBack();
            $this->arrErrorMsg = ["회원가입에 실패하셨습니다."];
            return "regist.php";
        }
        return "Location: /user/login";
    }
    
    // 이메일 체크 처리
    protected function chkEmailPost() {
        // 유저 입력 데이터 획득
        $requestData = [
            "u_email" => $_POST["u_email"]
        ];

        // response 데이터 초기화
        $responseArr = [
            "errorFlg"  => false
            ,"errorMsg" => ""
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
        }else {
            // 이메일 중복 체크
            $modelUsers = new UsersModel();
            $resultUserInfo = $modelUsers->getUserInfo($requestData);
            if(count($resultUserInfo) > 0) {
                $this->arrErrorMsg = ["이미 가입한 이메일입니다."];
            }
        }

        // response 데이터 셋팅
        if(count($this->arrErrorMsg) > 0) {
            $responseArr["errorFlg"] = true;
            $responseArr["errorMsg"] = $this->arrErrorMsg;
        }

        // response 처리
        header('Content-type: application/json');
        echo json_encode($responseArr);
        exit;
    }
    
    // 비밀번호 암호화
    private function encryptionPassword($pw, $email) {
        // base64_encode() : 암호와 소스코드
        return base64_encode($pw.$email);
    }
    

    // 회원수정 페이지로 이동
    protected function retouchGet() {
        
        // 회원정보 획득
        $requestData = [
            "u_id" => $_SESSION["u_id"]
        ];

        // 유저정보 획득
        $modelUsers = new UsersModel();
        $this->arrUserList  = $modelUsers->getUserInfo($requestData);

        // 로케이션 처리
        return "retouch.php";
    }
    // 회원 정보 수정 처리
    protected function retouchPost() {
        $requestData = [
            "u_name" => $_POST["u_name"]
            ,"u_pw" => $_POST["u_pw"]
            ,"u_pw_chk" => $_POST["u_pw_chk"]
        ];

        // 유저정보 획득
        $selectData = [
            "u_id"  => $_SESSION["u_id"]
        ];
        $modelUsers = new UsersModel();
        $this->arrUserList  = $modelUsers->getUserInfo($selectData);
        
        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "retouch.php";
        }

        // 유저 정보 업데이트
        $updateDate = [
            "u_id"  => $_SESSION["u_id"]
            ,"u_name" => $requestData["u_name"]
            ,"u_pw"  => $this->encryptionPassword($requestData["u_pw"], $this->getUserInfo("u_email")) // 암호화 하기 위해서 비번과 이메일를 불려와 암호화 진행하다
        ];
        $modelUsers->beginTransaction(); // 트랜잭션 시작
        $resultUpdate = $modelUsers->upDate($updateDate);
        if ($resultUpdate !== 1) {
            $modelUsers->rollBack();
            $this->arrErrorMsg = ["회원정보 수정 실패"];
            return "retouch.php"; 
        }

        $modelUsers->commit();
        return "Location: /board/list";
    }

    // ----------------------------------------------------------------------------------------
    // 회원 정보 수정 처리 또 다른 방법
    // protected function retouchPost() {
    //     $requestData = [
    //         "u_id"     => $_SESSION["u_id"]
    //     ];
    //     // 유저정보 획득
    //     $modelUsers = new UsersModel();
    //     $this->arrUserList  = $modelUsers->getUserInfo($requestData);

    //     // 유저 정보 업데이트
    //     $requestData = [
    //         "u_name" => $_POST["u_name"]
    //         ,"u_pw" => $_POST["u_pw"]
    //         ,"u_id" => $_SESSION["u_id"]
    //     ];
    //     $requestData1 = [
    //         "u_pw" => $_POST["u_pw"]
    //         ,"u_name" => $_POST["u_name"]
    //         ,"u_pw_chk" => $_POST["u_pw_chk"]
    //     ];

    //     // 유효성 체크
    //     $resultValidator = UserValidator::chkValidator($requestData1);
    //     if (count($resultValidator) > 0) {
    //             $this->arrErrorMsg = $resultValidator;
    //             return "retouch.php";
    //     }
    //     // 비번 암호화
    //     $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $this->arrUserList["u_email"]);

    //     // 업데이트 획득
    //     $modelUsers = new UsersModel();
    //     $modelUsers->beginTransaction(); // 트랜잭션 시작
    //     if($modelUsers->upDate($requestData) === 1){
    //         $modelUsers->commit();
    //         return "Location: /board/list";
    //     }else {
    //         $modelUsers->rollBack();
    //         $this->arrErrorMsg = "회원정보 수정 안됨";
    //         return "retouch.php"; 
    //     }
    // }

}

