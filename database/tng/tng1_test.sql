-- 1. 사원 정보테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500000
	,19990413
	,'Kwon'
	,'minsea'
	,'F'
	,20240311
);
	
-- 2. 월급, 직책, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500000
	,'신입'
	,20240311
	,99990311
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,2500000
	,20240311
	,99990311
);
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500000
	,'d009'
	,20240311
	,99990311
);
-- 3. 짝궁의 [1,2]것도 넣어주세요.
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500001
	,19980606
	,'Kim'
	,'sowon'
	,'F'
	,20240311
);
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500001
	,'Staff'
	,20240311
	,99990311
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500001
	,2500000
	,20240311
	,99990311
);
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500001
	,'d004'
	,20240311
	,99990311
);
-- 4. 나와 짝궁의 소속 부서를 d009로 변경해 주세요.
UPDATE dept_emp
SET
	dept_no = 'd009'
WHERE
	emp_no = 500001
;
-- 5. 짝궁의 모든 정보를 삭제해 주세요.
DELETE FROM employees
WHERE emp_no = 500001
;
DELETE FROM titles
WHERE emp_no = 500001
;
DELETE FROM salaries
WHERE emp_no = 500001
;
DELETE FROM dept_emp
WHERE emp_no = 500001
;
-- 6.'d009'부서의 관리자를 나로 변경해 주세요.
-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
UPDATE titles
SET
	title = 'Senior Engineer'
WHERE
	emp_no = 500000
	AND DATE(NOW())
;
-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
SELECT
	MAX(sal.salary)
	,MIN(sal.salary)
	,emp.emp_no
	,emp.first_name
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no		
;

-- 9. 전체 사원의 평균 연봉을 출력해 주세요.
SELECT
	AVG(salary)
FROM salaries
WHERE to_date >= NOW();

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT
	emp_no
	,AVG(salary)
FROM salaries
WHERE emp_no = 499975
;

CREATE DATABASE users;
USE users;
CREATE TABLE users (
	user_id			INT 				PRIMARY KEY AUTO_INCREMENT
	,user_name 		VARCHAR(30) 	NOT NULL
	,authflg			CHAR(1)			DEFAULT 0
	,birth_day		DATE				NOT NULL
	,created_at 	DATETIME 		DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD'
);

INSERT INTO users (
	user_id
	,user_name
	,authflg
	,birth_day
	,created_at
)
VALUES (
	000001
	,'그린'
	,0
	,20240126
	,20240311
);


















