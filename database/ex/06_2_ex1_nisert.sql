-- 사원 마지막 번호
SELECT MAX(emp_no)
	FROM employees
;
-- INSERT INTO 테이블명 ( 컬럼1, 컬럼2...)
-- INSERT : 신규 데이터 저장
-- VALUES (값1, 값2...);
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500002
	,19990413
	,'hong'
	,'gildong'
	,'F'
	,20240305
)
;
SELECT *
	FROM employees
WHERE emp_no = 500001
;

-- SELECT INSER (다중 레코드 INSER) : SELECT한 결과를 가지고 INSERT를 실행
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
	)
SELECT (
	500005
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
FROM employees
WHERE emp_no = 500005
;

-- 신입 사원의들의 직책 정보를 SELECT INSERT를 이용해서 저장
INSERT INTO titles(emp_no,title,from_date,to_date)
SELECT
	emp_no
	,'신입'
	,DATE(NOW())
	,DATE(99990101)
FROM employees
WHERE hire_date >= 20240305
;

-- 자신의 사원 정보를 사원 테이블에 저정
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	5000002
	,19990413
	,'Kwon'
	,'minsea'
	,'F'
	,20240305
)
;
-- 자신의 직책 정보 저장
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	5000002
	,'신입'
	,20240305
-- ,DATE(NOW())
	,to_date
)
;
-- 자신의 급여 정보 저장
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	5000002
	,2500000
	,20240305
	,to_date
)
;
