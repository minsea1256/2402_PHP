-- 1. 탈퇴한 회원의 정보를 출력해 주세요.
SELECT
	*
FROM users
WHERE deleted_at IS NOT NULL
;
-- 2. 삭제 되지 않은 게시글을 조회수가 높은 순서(조회수가 같을 경우 작성일이 최신순으로)대로 출력해 주세요.
SELECT
	views 
	,updated_at
FROM boards
WHERE deleted_at IS NULL
	ORDER BY views DESC
;
-- 3. 찜한 게시글이 3개 이상인 회원의 번호를 출력해 주세요.
SELECT
	wis.id
FROM wishlists wis
	JOIN boards bor
		ON wis.user_id = bor.user_id
WHERE wis.board_id >= 3
ORDER BY wis.id
;

-- 4. 이메일이 'test_35@green.com'인 회원가 작성한 게시글의 정보를 수정일자가 최신순으로 출력해 주세요.
SELECT
	bor.updated_at
	,usr.email
FROM users usr
	JOIN boards bor
		ON usr.id = bor.id
WHERE usr.email = 'test_35@green.com'
ORDER BY bor.updated_at DESC
;

-- 5. 탈퇴한 회원이 작성했던 게시글의 pk를 출력해 주세요.
SELECT
	usr.id
FROM users usr
	JOIN boards bor
		ON usr.id = bor.id
	AND usr.deleted_at <= DATE(NOW())
;

-- 6. 이름이 '사람_173'이 작성한 게시글과 찜목록을 모두 삭제처리 해주세요.
DELETE 
FROM users usr 
	JOIN wishlists wis
		ON usr.id = wis.id
	JOIN boards bor
		ON wis.user_id = bor.user_id
	AND usr.name = '사람_173'
WHERE IN(wis.board_id , bor.created_at);


-- 7. 탈퇴한 회원이 작성했던 게시글을 모두 삭제처리 해주세요.


-- 8. 가입일이 2020년 이후인 회원이 찜한 게시글의 제목과 내용을 출력해 주세요.
SELECT
	bor.title
	,bor.content
FROM users usr
	JOIN boards bor
		ON usr.id = bor.id
	AND usr.created_at >= 20200000

;