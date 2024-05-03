<?php
namespace controller;

use model\BoardsModel;

class BoardController extends Controller {
    protected $arrBoardList = []; // 게시글 정보
    private $boardType = "0"; // 보트 타입

    // 캡슐화
    // boardType getter
    public function getBoardType() {
        return $this->boardType;
    }
    // boardType setter
    public function setBoardType($boardType) {
        $this->boardType = $boardType;
    }

    // 게시글 리스트
    // protected 부모에게 접근해야하고 캡슐화로 인해 사용했다
    protected function listGet() {
        // 보드타입 확인
        $requestData = [
            "b_type" => isset($_GET["b_type"]) ? $_GET["b_type"] : "0"
        ];
        // $b_type = isset($_GET["b_type"]) ? $_GET["b_type"] : "0";

        // 보드타입 프로퍼티 셋
        $this->setBoardType($requestData["b_type"]);

        // TODO : 유효성 체크는 시간이 남으면 도전해보세요.

        // 페이지 제목
        foreach($this->arrBoardsNameInfo as $item) {
            if($item["b_type"] === $requestData["b_type"]) {
                $this->boardName = $item["bn_name"];
                break;
            }
        }

        // 게시글 정보 획득
        $modelBoards = new BoardsModel();
        $this->arrBoardList = $modelBoards->getBoardList($requestData);

        // 사용한 모델 파기  
        $modelBoards->destroy();

        return "boardList.php";
    }

    // 게시글 작성
    public function addPost() {
        // 이미지 파일 처리
        $path = "";
        if(!empty($_FILES["img"]["name"])) {
            $path = "/"._PATH_IMG.$_FILES["img"]["name"];
            move_uploaded_file($_FILES["img"]["tmp_name"], _ROOT.$path);
        }
        
        // from : 현재위치 to : 저장위치
        move_uploaded_file($_FILES['img']["tmp_name"], _ROOT.$path);

        $requestData = [
            "b_type"     => $_POST["b_type"]
            ,"b_title"   => $_POST["b_title"]
            ,"b_content" => $_POST["b_content"]
            ,"b_img"     => $path
            ,"u_id"      => $_SESSION["u_id"]
        ];

        // 글작성 처리
        $modelBoards = new BoardsModel();
        $modelBoards->beginTransaction(); // 트랜잭션 시작
        // $resultAddBoard = $modelBoards->addBoard($requestData);
        // if문으로 넣어서 적용하는 방법
        if($modelBoards->addBoard($requestData) === 1){
            $modelBoards->commit();
        }else {
            $modelBoards->rollBack();
        }
        return "Location: /board/list?b_type=".$requestData["b_type"];
    }

    // 상세 정보 조회
    public function detailGet() {
        $requestData = [
            "b_id" => $_GET["b_id"] // 자바스크립트로 잡아준다
        ];

        // 게시글 정보 조회
        $modelBoards = new BoardsModel();
        $resultBoard = $modelBoards->getBoard($requestData);

        // 로그인 유저 pk 추가
        $resultBoard[0]["login_u_id"] = $_SESSION["u_id"];

        // JSON 변환
        $response = json_encode($resultBoard);

        // response 처리
        header("Content-type: application/json");
        echo $response;
        exit;
    }
}