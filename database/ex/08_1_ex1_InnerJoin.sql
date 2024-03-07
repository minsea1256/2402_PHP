-- JOIN 문
-- 두개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력
-- JOIN문은 MAX는 3개까지 허용: 이유는 느려진다

-- *** INNER JOIN 문 ***
-- 두 테이블이 공통적으로 만족하는 조건의 레코드를 출력
-- 사원번호, 이름, 소속부서를 출력
SELECT 
	emp.emp_no
	,emp.first_name
	,depte.dept_no
FROM employees emp
	INNER JOIN dept_emp depte
		ON emp.emp_no = depte.emp_no
WHERE depte.to_date >= NOW(); 

-- 사원번호 , 이름, 소속부서코드 , 부서명을 출력
SELECT 
	emp.emp_no
	,emp.first_name
	,depte.dept_no
	,dept.dept_name
FROM employees emp
	JOIN dept_emp depte
		ON emp.emp_no = depte.emp_no
	JOIN departments dept
		ON depte.dept_no = dept.dept_no
WHERE depte.to_date >= NOW()
ORDER BY emp.emp_no
;

-- LEFT OUTER JOIN (LEFT JOIN으로 줄여서 많이 사용)
-- 왼쪽 테이블을 기준 테이블로 두고 JOIN을 실행
-- 기준 테이블의 모든 데이터를 출력하고
-- 조인 대상 테이블에 없는 값은 NULL로 출력
-- 사원번호, 이름, 소속부서를 출력
SELECT
	emp.emp_no
	,emp.first_name
	,depte.*
FROM employees emp
	LEFT JOIN dept_emp depte
		ON emp.emp_no = depte.emp_no
;

-- RIGHT OUTER JOIN (RIGHT JOIN으로 줄여서 많이 사용)
-- 오른쪽 테이블을 기준 테이블로 두고 JOIN을 실행
-- 기준 테이블의 모든 데이터를 출력하고
-- 조인 대상 테이블에 없는 값은 NULL로 출력

SELECT
	emp.emp_no
	,emp.first_name
	,depte.*
FROM employees emp
	RIGHT JOIN dept_emp depte
		ON emp.emp_no = depte.emp_no
;

-- UNION
-- 두개 이상의 쿼리의 결과를 합쳐서 출력
-- UNION ALL : 두개 동일한 결과도 다 출력
SELECT * FROM employees WHERE emp_no IN(10001, 10003)
UNION ALL
SELECT * FROM employees WHERE emp_no IN(10003);

ALTER TABLE employees ADD COLUMN sup_no INT;

UPDATE employees SET sup_no = 10004 WHERE emp_no IN (10001, 10005);
UPDATE employees SET sup_no = 10008 WHERE emp_no IN (10004, 10002, 10006);

-- SELF JOIN
-- 자기 자신을 조인
-- 슈퍼바이저인 사원의 모든정보를 출력
SELECT DISTINCT
	emp1.*
FROM employees emp1
	JOIN employees emp2
		ON emp1.emp_no = emp2.sup_no
;

























