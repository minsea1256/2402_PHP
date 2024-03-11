-- 계정 및 권한 관리

-- 권한 확인
SELECT * FROM mysql.USER;

-- 계정 생성
CREATE USER 'user1'@'locallhost' IDENTIFIED BY 'user1';

-- 계정에 권한 부여
GRANT SELECT, INSERT, UPDATE, DELETE ON employees.* TO 'user1'@'locallhost';

-- 권한 삭제
REVOKE INSERT, UPDATE, DELETE ON employees.* FROM 'user1'@'locallhost';

-- 계정 삭제
DROP USER 'user1'@'locallhost';