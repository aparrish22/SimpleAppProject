<?php
	/* Connect to DB */
	$connection  = mysqli_connect('localhost', 'root', '');
	if (!$connection ) {
		die('Could not connect: ' . mysqli_error());
	}
	
	mysqli_select_db($connection,"employees");

	/* Select Variables via SQL */ /* MANAGER IS NOT IN HERE YET */
	$SQLstring = "SELECT first_name, last_name, AVG(salary), title, dept_name
				FROM employees AS E, salaries as S, titles as T, dept_emp AS DE, departments AS D
				WHERE E.emp_no = S.emp_no AND E.emp_no = T.emp_no AND DE.dept_no = D.dept_no
				GROUP BY E.emp_no
				";

	/* end of SQL variables */


	$QueryResult = @mysqli_query($connection, $SQLstring);


	/* fetch each row and store into array, then json encode for ajax call */
	$rowArray = array();

	while ($row = mysqli_fetch_array($QueryResult)) {

		$rowArray[] = array(
			'first_name' => $row["first_name"],
			'last_name' => $row["last_name"],
			'hire_date' => $row["hire_date"],
			'salary' => $row["salary"],
			'title' => $row["title"],
			'dept_name' => $row["dept_name"]
		);

	};

	/* results/data for DataTable to read */
	$tableData = array(
		"sEcho" => 10,
		"iTotalRecords" => count($rowArray),
		"iTotalDisplayRecords" => count($rowArray),
		"aaData" => $rowArray
	);

	/* Create json file */
	$file = 'data'.'.json';

	if (file_put_contents($file, json_encode($tableData) )) {
		echo $file.' file created';
	} else {
		echo 'Error with Creating data.json file.';
	}
	
?>