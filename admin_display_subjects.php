
<?php
	
	include("connect.php");

	
	// session_start();

	// if(isset($_POST['Submit']))
	// {
			
	// }

?>



<!DOCTYPE html>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script>
			function delete_link(subject_id) {
				var ans = confirm("Are you sure you want to delete the data?");
				if (ans) {
					var data = {
									subject_id: subject_id
								}
					var link = "admin_enter_subject_action.php?p=delete";
					var success = function(response) {
						alert(response);
						setTimeout(function(){
									window.location.href = "admin_display_subjects.php";
								});
					}
					$.post(link, data, success, "html");
				} else {
					alert("Delete Cancelled!");
				}
			}
		</script>

<script>
</script>

<html>

	<head>
	
		<title>Admin Display Subjects</title>
		
		<link type="text/css" rel="stylesheet" href="admin_Index.css">
		
		<style type="text/css">
		
			.container
			{
				height:0px;
				border: 0px;
			}
		
			.container button:hover
			{
				background-color:lightblue;
				
			}
		
		
		</style>
		
	</head>
	
	<body>
	
		<div class="wrapper">
		
			<div id="logo">
				
				<a href="#"><img src="Images\JCUSColourLogo.png"></a>
			
			</div>
			
			<div id="main_title">
			
				ONLINE TIMETABLE SYSTEM
				
			</div>
		
		</div>
		
		<div class="container">
			
			<h2 style="text-align:center">Subject List</h2>

			<button style="height:50px; width:200px; margin-left:50px;"><a href="admin_enter_subjects.php">Add New Subjects</a></button>

			<table border="1" style="margin-left:0px; margin-top:20px">
				<thead>
					<tr>
						<td><b>No.</b></td>
						<td><b>Subject Code</b></td>
						<td><b>Subject Name</b></td>
						<td><b>Course</b></td>
						<td><b>Discipline</b></td>
						<td><b>Day</b></td>
						<td><b>Start_Time</b></td>
						<td><b>End_Time</b></td>
						<td><b>Room_No</b></td>
						<td><b>Action</b></td>
					</tr>
				</thead>

				<?php 
					$sql = "SELECT * FROM subject_table";
					$query = mysqli_query($con, $sql);

					while($row = $query->fetch_assoc()) { 
						$sql_course = "SELECT course_desc FROM course_table WHERE course_id = ".$row['course_id'];
						$query_course = mysqli_query($con, $sql_course);
						while ($row_course = $query_course->fetch_assoc()) {
							$course_desc = $row_course['course_desc'];
						}

						$sql_discipline = "SELECT discipline_name FROM discipline_table WHERE discipline_id = ".$row['discipline_id'];
						$query_discipline = mysqli_query($con, $sql_discipline);
						while ($row_discipline = $query_discipline->fetch_assoc()) {
							$discipline_name = $row_discipline['discipline_name'];
						}
						?>
						<tbody>
							<tr>
								<td><?=$row['SUBJECT_ID']; ?></td>
								<td><?=$row['Subject_code']; ?></td>
								<td><?=$row['Subject_name']; ?></td>
								<td><?=$course_desc; ?></td>
								<td><?=$discipline_name; ?></td>
								<td><?=$row['day']; ?></td>
								<td><?=$row['start_time']; ?></td>
								<td><?=$row['end_time']; ?></td>
								<td><?=$row['room_no']; ?></td>
								<td><a href="admin_edit_subject.php?p=edit&subject_id=<?=$row['SUBJECT_ID']; ?>">Edit</a> | <a onclick="delete_link(<?=$row['SUBJECT_ID']; ?>); return false;" href="admin_enter_subject_action.php?p=delete&subject_id=<?=$row['SUBJECT_ID']; ?>">Delete</a></td>
							</tr>
						</tbody>
					<?php } ?>
			</table>			
			
		</div>
		
	</body>
	
</html>