-- SUB QUERY
-- 쿼리 안에 또다른 쿼리가 들어있는 쿼리

-- WHERE 절에 사용하는 서브쿼리
-- d001부서장의 사원 정보 출력
SELECT *
FROM employees
WHERE 
	emp_no = (
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd001'
	AND to_date >= NOW()
);
	
SELECT
	emp_no
FROM dept_manager
WHERE
	dept_no = 'd001'
	AND to_date >= NOW()
;

-- 모든 부서의 부서장의 사원 정보를 출력
SELECT *
FROM employees
WHERE 
	emp_no IN (
	SELECT emp_no
	FROM dept_manager
	WHERE to_date >= NOW()
);


SELECT *
FROM employees
WHERE 
	emp_no IN (10001, 10002, 10003);

-- d001 부서에서 속했던 적이 있는 사원의 사번과 풀네임을 출력
SELECT 
	emp_no
	,CONCAT_WS(' ','last_name','first_name') full_name
FROM employees
WHERE 
	emp_no IN (
		SELECT emp_no
		FROM dept_emp
		WHERE dept_no = 'd001'
);
-- 현재 직책이 Senior Engineer인 사원의 사번과 생일을 출력
SELECT
	emp_no
	,birth_date
FROM employees
WHERE
	emp_no IN(
		SELECT emp_no
		FROM titles
		WHERE 
			title = 'Senior Engineer'
			AND to_date >= NOW()
	);

-- 다중열 서브쿼리
SELECT
	*
FROM dept_emp dpe
WHERE (dpe.dept_no, dpe.emp_no) IN (
	SELECT 
		dpm.dept_no
		,dpm.emp_no
	FROM dept_manager dpm
);

-- SELECT에 사용하는 서브쿼리
-- 사원의 사원번호, 평균급여, 사원명
SELECT 
	employees.emp_no
	,(
		SELECT AVG(salaries.salary)
		FROM salaries
		WHERE salaries.emp_no = employees.emp_no
	) avg_sal
	,employees.first_name
FROM employees
;


-- FROM 절에서 사용되는 서브쿼리
SELECT tmp.*
FROM 
	(
	SELECT emp_no, birth_date
	FROM employees
) tmp
;


-- INSERT 문에서 서브쿼리 사용
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	( SELECT MAX(emp.emp_no) + 1 FROM employees emp)
	,19990413
	,'Kwon'
	,'minsea'
	,'F'
	,20240306
)
;


-- UPDATE 문에서 사용
UPDATE employees
SET 
	first_name = (
		SELECT LEFT(title, 10)
		FROM titles
		WHERE emp_no = 10001
			AND to_date >= NOW()
	)
WHERE emp_no = 500000;













