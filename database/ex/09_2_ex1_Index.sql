-- Index : 쿼리 생성 시간은 단축되어 잘 사용하면 좋다 하지만 단점도 있는점 기억하자!

-- Index 확인
SHOW INDEX FROM employees;

-- Index 적용 후 0초
-- 0.125 초
SELECT *
FROM employees
WHERE first_name = 'Saniya';

-- Index 생성
ALTER TABLE employees ADD INDEX idx_emloyees_first_name (first_name);

-- Index 삭제
DROP INDEX idx_emloyees_first_name ON employees;






















