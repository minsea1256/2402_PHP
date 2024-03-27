1. 아래의 테이플을 작성
	1-1 테이블명 : users
		- 컬럼
			> id			INT				PK, 자동증가
			> name			VARCHAR(50)		NULL비허용
			> email			VARCHAR(100)	NULL비허용, 유니크
			> created_at	DATE			NULL비허용, 기본값 현재날짜
			> updated_at	DATE			NULL비허용, 기본값 현재날짜
			> deleted_at	DATE			NULL허용
			
CREATE DATABASE test;
USE test;
CREATE TABLE users (
	id					INT				PRIMARY KEY AUTO_INCREMENT
	,NAME				VARCHAR(50)		NOT NULL
	,email			VARCHAR(100)	NOT NULL
	,created_at		DATE				NOT NULL	 DEFAULT CURRENT_TIMESTAMP()
	,updated_at		DATE				NOT NULL	 DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		DATE			
);

2-1 테이블명 : boards
	- 컬럼
		> id			INT				PK, 자동증가
		> user_id		INT				FK(users.id 참조)
		> title			VARCHAR(100)	NULL비허용
		> content		VARCHAR(1000)	NULL비허용
		> created_at	DATE			NULL비허용, 기본값 현재날짜
		> updated_at	DATE			NULL비허용, 기본값 현재날짜
		> deleted_at	DATE			NULL허용
		
USE test;
CREATE TABLE boards (
	id					INT				PRIMARY KEY AUTO_INCREMENT
	,user_id			INT				NOT NULL
	,title			VARCHAR(100)	NOT NULL
	,content			VARCHAR(1000)	NOT NULL
	,created_at		DATE				NOT NULL 	DEFAULT CURRENT_TIMESTAMP()
	,updated_at		DATE				NOT NULL 	DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		DATE
);

3-1 테이블명 : wishlists
	- 컬럼
		> id			INT				PK, 자동증가
		> user_id		INT				FK(users.id 참조)
		> board_id		INT				FK(boards.id 참조)
		> created_at	DATE			NULL비허용, 기본값 현재날짜
		> updated_at	DATE			NULL비허용, 기본값 현재날짜
		> deleted_at	DATE			NULL허용
		
USE test;
CREATE TABLE wishlists (
	id					INT			PRIMARY KEY AUTO_INCREMENT
	,user_id			INT			NOT NULL
	,board_id		INT			NOT NULL
	,created_at		DATE			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at		DATE			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		DATE
);		
		
2. boards 테이블에 아래 컬럼을 추가
	- views		INT		NULL비허용, 기본값 0
ALTER TABLE boards ADD CONSTRAINT views INT NOT NULL DEFAULT '0';

3. users 테이블에 아래 3명의 정보를 작성
	- 홍길동, 갑돌이, 갑순이
INSERT INTO users(
	id
	,name
	,email
	,created_at
	,updated_at
	,deleted_at	
)
VALUES (
	( SELECT MAX(emp.emp_no) + 1 FROM employees emp)
	,19990413
	,'홍'
	,'길동'
	,'M'
	,DATE(NOW());
)
VALUES (
	( SELECT MAX(emp.emp_no) + 1 FROM employees emp)
	,19980606
	,'갑'
	,'돌이'
	,'M'
	,DATE(NOW());
)
VALUES (
	( SELECT MAX(emp.emp_no) + 1 FROM employees emp)
	,19970410
	,'갑'
	,'순이'
	,'F'
	,DATE(NOW());
);
	
4. boards 테이블에 아래 데이터 작성
	- 홍길동 유저가 작성한 글 4개
	- 갑돌이 유저가 작성한 글 3개
	- 갑순이 유저가 작성한 글 2개
INSERT INTO boards(

)
VALUES(

)
	
5. wishlists 테이블에 아래 데이터 작성
	- 홍길동 유저가 찜한 글 2개
	- 갑돌이 유저가 찜한 글 5개
	- 갑순이 유저가 찜한 글 9개
	
	
6. 홍길동 유저의 탈퇴 처리


7. wishlists의 모든 데이터 물리적 삭제
DROP PROCEDURE wishlists;

8. 모든 테이블 제거
TRUNCATE TABLE test;