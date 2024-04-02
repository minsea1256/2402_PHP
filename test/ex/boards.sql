-- 1. 탈퇴한 회원의 정보를 출력해 주세요.
SELECT
	*
FROM users
WHERE deleted_at IS NOT NULL
;
-- 2. 삭제 되지 않은 게시글을 조회수가 높은 순서(조회수가 같을 경우 작성일이 최신순으로)대로 출력해 주세요.
SELECT
	*
FROM boards
WHERE deleted_at IS NULL
	ORDER BY views DESC, created_at DESC
;
-- 3. 찜한 게시글이 3개 이상인 회원의 번호를 출력해 주세요.
SELECT
	user_id
FROM wishlists 
GROUP BY user_id HAVING COUNT(*) >= 3
;

-- 4. 이메일이 'test_35@green.com'인 회원가 작성한 게시글의 정보를 수정일자가 최신순으로 출력해 주세요.
SELECT
	boards.*
FROM boards
	JOIN users
		ON users.id = boards.user_id
WHERE users.email = 'test_35@green.com'
ORDER BY boards.updated_at DESC
;

-- 5. 탈퇴한 회원이 작성했던 게시글의 pk를 출력해 주세요.
SELECT
	bor.id
FROM users usr
	JOIN boards bor
		ON usr.id = bor.user_id
	AND usr.deleted_at IS NOT NULL
;

-- 6. 이름이 '사람_173'이 작성한 게시글과 찜목록을 모두 삭제처리 해주세요.
-- 한 테이블씩 처리하는게 수정도 편하다
UPDATE boards
SET 
	deleted_at = DATE(NOW()) 
WHERE USER_id IN(SELECT id FROM users WHERE NAME='사람_173')
;
UPDATE wishlists
SET 
	deleted_at = DATE(NOW()) 
WHERE USER_id IN(SELECT id FROM users WHERE NAME='사람_173')
;
-- 7. 탈퇴한 회원이 작성했던 게시글을 모두 삭제처리 해주세요.
UPDATE boards
SET 
	deleted_at = DATE(NOW()) 
WHERE user_id IN(SELECT id FROM users WHERE deleted_at IS NOT NULL)
;

-- 8. 가입일이 2020년 이후인 회원이 찜한 게시글의 제목과 내용을 출력해 주세요.
SELECT DISTINCT
	bor.title
	,bor.content
FROM users usr
	JOIN wishlists wis
		ON usr.id = wis.user_id
	AND usr.created_at >= 20200101000000
	JOIN boards bor
		ON wis.board_id = bor.id
;