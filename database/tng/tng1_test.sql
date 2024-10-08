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
	,DATE(NOW())
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
	,DATE(NOW())
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
	,DATE(NOW())
),
VALUES (
	500002
	,19990103
	,'Kim'
	,'minsea'
	,'F'
	,DATE(NOW())
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
	,DATE(NOW())
	,99990311
),
VALUES (
	500002
	,'Staff'
	,DATE(NOW())
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
	,DATE(NOW())
	,99990311
)
,VALUES (
	500002
	,2500000
	,DATE(NOW())
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
	,DATE(NOW())
	,99990311
),
VALUES (
	500002
	,'d004'
	,DATE(NOW())
	,99990311
);
-- 4. 나와 짝궁의 소속 부서를 d009로 변경해 주세요.
UPDATE dept_emp
SET to_date = DATE(NOW())
WHERE emp_no IN (500000,500001,500002);
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
),
VALUES (
	500001
	,'d004'
	,DATE(NOW())
	,99990311
),
VALUES (
	500002
	,'d004'
	,DATE(NOW())
	,99990311
);
-- 5. 짝궁의 모든 정보를 삭제해 주세요.
DELETE FROM employees
WHERE emp_no IN (500001,500002) 
;
DELETE FROM titles
WHERE emp_no IN (500001,500002) 
;
DELETE FROM salaries
WHERE emp_no IN (500001,500002) 
;
DELETE FROM dept_emp
WHERE emp_no IN (500001,500002) 
;
-- 6.'d009'부서의 관리자를 나로 변경해 주세요.
UPDATE dept_manager
SET to_date = DATE(NOW())
WHERE dept_no = 'd009'
	AND to_date > DATE(NOW());
INSERT INTO dept_manager(dept_no, emp_no, from_date, to_date)
VALUES('d009', 500000, DATE(NOW()) ,99990101)
;
-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
UPDATE titles
SET to_date = DATE(NOW())
WHERE emp_no = 500000;
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500000
	,'Senior Engineer'
	,DATE(NOW())
	,99990101
);


-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
SELECT
	emp.emp_no
	,emp.first_name
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date > DATE(NOW())		
		AND sal.salary IN (                                           
		(SELECT MAX(salary) FROM salaries WHERE to_date > DATE(NOW()))
		,(SELECT MIN(salary) FROM salaries WHERE to_date > DATE(NOW()))	
	)
;

SELECT
	emp.emp_no
	,emp.first_name
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date > DATE(NOW())	
	JOIN ( SELECT 
				MAX(salary) max_sal
				,MIN(salary) min_sal
			FROM salaries 
			WHERE to_date > DATE(NOW())
			) minmax_sal
		ON sal.salary IN (minmax_sal.max_sal,minmax_sal.min_sal)
;


-- 9. 전체 사원의 평균 연봉을 출력해 주세요.
SELECT
	AVG(salary) avg_sal
FROM salaries
WHERE to_date >= DATE(NOW());

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT
	emp_no
	,AVG(salary) avg_sal
FROM salaries
WHERE emp_no = 499975
;

-- 01
CREATE TABLE users (
	userid			INT 				PRIMARY KEY AUTO_INCREMENT
	,username 		VARCHAR(30) 	NOT NULL
	,authflg			CHAR(1)			DEFAULT '0'
	,birthday		DATE				NOT NULL
	,created_at 	DATETIME 		DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD'
);

-- 02
INSERT INTO users (
	username
	,authflg
	,birthday
	,created_at
)
VALUES (
	'그린'
	,0
	,20240126
	,NOW()
);

-- 03
UPDATE users
SET 
	username = '테스터'
	,authflg = '1'
	,birthday = 20070301
WHERE userid = 1;
	
-- 04
DELETE FROM users
WHERE userid = 1;

-- 05
ALTER TABLE users ADD COLUMN addr VARCHAR(100) NOT NULL DEFAULT '-';

-- 06
DROP TABLE users;

-- 07
SELECT
	usr.username
	,usr.birthday
	,rmg.rankname
FROM uesrs usr
	JOIN reankmanagement rmg
		ON usr.userid = rmg.uesrid
;









//뭐요 뭘 봐요? 내가 여기 적겠다는데 불만이셔요?ㅋㅋㅋ 퉤






