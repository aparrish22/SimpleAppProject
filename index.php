<!DOCTYPE html>
<html>
<head>
	<title>Simple App Project using EmployeeDB Sample</title>
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
</head>
<body>

	<table id="employees">

	    <thead>
	      <tr><th class="site_name">First Name</th><th>Last Name</th><th>Hire Date</th><th>Salary</th><th>Title</th><th>Department Name</th><th>Department Manager Name</th></tr>
	    </thead>

	    <tbody>
	    </tbody>

	</table>

	<!-- Call script that will pass back an array of data -->
	<script src="callerScript.js"></script>

	
	<script>
	$(function(){
		$("#employees").dataTable({
			"bProcessing": true,
			"sAjaxSource": "data.json",
			"aoColumns": [{
				"mData": "first_name",
				"sTitle": "First Name"
			},{ 
				"mData": "last_name",
				"sTitle": "Last Name"
			},{
				"mData": "hire_date",
				"sTitle": "Hire Date"
			},{
				"mData": "salary",
				"sTitle": "Avg Salary"
			},{
				"mData": "title",
				"sTitle": "Title"
			},{
				"mData": "dept_name",
				"sTitle": "Department"
			}

			]
		});
	});
	</script>

</body>
</html>