CREATE DATABASE mini_multi_board;
USE mini_multi_board;

-- 1) users(유저) Table
-- 		- pk, 이메일, 비밀번호, 이름, 가입일자, 수정일자, 탈퇴일자
CREATE TABLE users (
	u_id				INT				PRIMARY KEY AUTO_INCREMENT
	,u_email			VARCHAR(50)		NOT NULL
	,u_pw				VARCHAR(256)	BINARY	NOT NULL	
	,u_name			VARCHAR(50)		NOT NULL
	,created_at		DATETIME			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at		DATETIME			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		DATETIME
);

-- 2) boards(게시판) table
-- 		-pk, 유저pk, 게시판타입, 제목, 내용, 이미지파일, 작성일자, 수정일자, 삭제일자
CREATE TABLE boards (
	b_id				INT				PRIMARY KEY AUTO_INCREMENT
	,U_id				INT				NOT NULL
	,b_type			CHAR(1)			NOT NULL
	,b_title			VARCHAR(50)		NOT NULL 
	,b_content		VARCHAR(1000)	NOT NULL 
	,b_img			VARCHAR(256)
	,created_at		DATETIME			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at		DATETIME			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		DATETIME
);

-- 3) boardsname(게시판 기본 정보) table
-- 		-pk, 게시판타입, 게시판이름
CREATE TABLE boardsname (
	bn_id			INT				PRIMARY KEY AUTO_INCREMENT
	,b_type		CHAR(1)			NOT NULL UNIQUE
	,bn_name		VARCHAR(30)		NOT NULL
);

-- FK 추가
ALTER TABLE boards ADD CONSTRAINT fk_boards_u_id FOREIGN KEY (u_id) REFERENCES users(u_id);
ALTER TABLE boards ADD CONSTRAINT fk_boardsname_b_type FOREIGN KEY (b_type) REFERENCES boardsname(b_type);

-- 게시판 이름 테이블 정보 삽입
INSERT INTO boardsname ( b_type, bn_name )
VALUES ('0', '자유게시판')
,('1', '짱구게시판');

-- test용 유저 정보 추가
INSERT INTO users ( u_email, u_pw, u_name )
VALUES ('admin@admin.com','qwer1234!','관리자');

-- 테스트용 게시글 추가
INSERT INTO boards(u_id, b_type, b_title, b_content, b_img)
VALUES('1', '0', '집가고싶다!!!!', '집으로 보내줘!!!!!', '/view/img/home.jpg')
,('1', '0', '집가고싶다!!!!', '집으로 보내줘!!!!!', '/view/img/home01.jpg')
,('1', '0', '집사 어디가냥!', '날 버리고 어디가냥 집사냥 추르 내놔라!!!!!', '/view/img/7SO2FDuNnzmK_kE68K_wceSKJqoW8-E4vQnJE3uAItSdqFbjbwHMgITRfWLnssiT7MLWzTz3n6nBedGTFFC1EA.webp')
,('1', '0', '헉!', '추르 내놔라!!!!!!!!!!!', '/view/img/images.jpg')
,('1', '1', '쏴봐', '아무것도 못하쥬~', '/view/img//view/img/01.gif')
,('1', '1', '부리부리', '다시 돌려줘!!!', '/view/img/20190215184854_iltcawdu.gif')
,('1', '1', '으이익!!!!!', '질수없다!!!', '/view/img/unnamed.gif')
,('1', '1', '질문2', '질문 내용2', '/view/img/ab5df0f58b61c713128ad360ae8b104c5edc4427c166231ee6b5bf5b7a89db10.gif');

-- 게시판 추가
INSERT INTO boardsname(b_type, bn_name)
VALUES(2, '움짤모음 게시판');

INSERT INTO boards(u_id, b_type, b_title, b_content, b_img)
VALUES('1', '2', '집가고싶다!!!!', '집으로 보내줘!!!!!', '/view/img/IMG_0829.gif')
,('1', '2', '집가고싶다!!!!', '집으로 보내줘!!!!!', '/view/img/img.gif')
,('1', '2', '집가고싶다!!!!', '집으로 보내줘!!!!!', '/view/img/pxzIdDEaVUzaNoOXaIp9EaIj6S_-J3yytp_0xrkG_uOt7Jf88_4N5Qgi_b1wlvndtISRjH73IBhU_DrnUGdjbQ.gif');
INSERT INTO boards(u_id, b_type, b_title, b_content, b_img)
VALUES('1', '0', '힐링~', '❤❤❤❤', '/view/img/5bf7d81020d7fde00d3f81752d868b08_mp4.gif');











