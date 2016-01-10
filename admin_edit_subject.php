
<?php
	
	include("connect.php");

	
	session_start();

	if(isset($_POST['Submit']))
	{
			
	}

?>



<!DOCTYPE html>

		<script type="text/javascript" src="js/jquery.min.js"></script>

<script>
			$(document).ready(function() {
				$("select[name=sel_course]").change(function() {
					var sel  = $("select[name=sel_course]").val();
					var disc = $("select[name=sel_disc]").val();
					//alert(sel);

					var link = "fetch_subject.php";
					var data = {
							sel_course: sel,
							sel_discipline: disc
						};
					var success = function(response) {
						$("#subject").html(response);
					}
					$.post(link, data, success, "html");
				})
				
				$("select[name=sel_disc]").change(function() {
					var sel = $(this).val();
					var disc = $("select[name=sel_disc]").val();
					//alert(sel);
					
					var link    = "fetch_discipline.php";
					var link_2  = "fetch_subject.php";
					var data = {
						sel_course: sel,
						sel_discipline: disc
					};
					
					var success = function(response) {
						$("#discipline").html(response);
					}
					
					var success_2 = function(response) {
						$("#subject").html(response);
					}
					$.post(link, data, success, "html");
					$.post(link_2, data, success_2, "html");
				})
				
				$("input[name=Submit]").click(function() {
					var link = "login_action.php";
					var data = $("#login_form").serialize();
					var success = function(response) {
						if(response == "0") {
							alert("Username or Password did not match!");
						} else {
							alert("Successfully logged in!");
							setTimeout(function(){
								window.location.href = "Index.php";
							}, 1000);
						}
					}
					$.post(link, data, success, "html");
				});         
			});
			
			function courseChange() {
				var sel  = $("select[name=sel_course]").val();
				var disc = $("select[name=sel_disc]").val();
				//alert(sel);

				var link    = "fetch_discipline.php";
				var link_2  = "fetch_subject.php";
				var data = {
					sel_course: sel,
					sel_discipline: disc
				};

				var success = function(response) {
					$("#discipline").html(response);
				}

				var success_2 = function(response) {
					$("#subject").html(response);
				}
				$.post(link, data, success, "html");
				$.post(link_2, data, success_2, "html");
			}
			
			function disciplineChange() {
				var sel  = $("select[name=sel_course]").val();
				var disc = $("select[name=sel_disc]").val();
				//alert(sel);

				var link = "fetch_subject.php";
				var data = {
						sel_course: sel,
						sel_discipline: disc
					};
				var success = function(response) {
					$("#subject").html(response);
				}
				$.post(link, data, success, "html");
			}

			function subjectEdit(subject_id) {
				alert(subject_id);
				var form_data = $("form[name=subject_edit]").serialize();
				var link = "admin_enter_subject_action.php?p=edit&subject_id="+subject_id;
				var success = function(response) {
					alert(response);
					setTimeout(function(){
								window.location.href = "admin_display_subjects.php";
							}, 400);
				}
				$.post(link, form_data, success, "html");
			}
		</script>

<html>

	<head>
	
		<title>Admin HomePage</title>
		
		<link type="text/css" rel="stylesheet" href="admin_Index.css">
		
		<style type="text/css">
		
			.container
			{
				height: 600px;
				background-color:white;
			}
			.container form
			{
				background-color:#E3E3E3;
			}
			form #left_panel
			{
				float:left;
				height:370px;
				width:500px;
			
			}
			form #right_panel
			{
				float:left;
				height:340px;
				width:400px;
				padding-top:40px;
				
			}
		
		</style>
		
	</head>

	<?php 
	$subject_id = $_GET['subject_id'];
	$sql = "SELECT * FROM subject_table WHERE SUBJECT_ID = $subject_id LIMIT 1";
	$query = mysqli_query($con, $sql);
	while ($row = $query->fetch_assoc()) {
		$course_id 		= $row['course_id'];
		$post_discipline_id	= $row['discipline_id'];
		$term_id		= $row['Term_ID'];
		$type_major		= $row['type_major'];
		$type_core		= $row['type_core'];
		$type_elective	= $row['type_elective'];
		$type2_lecture 	= $row['type2_lecture'];
		$type2_workshop	= $row['type2_workshop'];
		$type2_tutorial	= $row['type2_tutorial'];
		$type2_lab		= $row['type2_lab'];
		$subject_code	= $row['Subject_code'];
		$subject_name 	= $row['Subject_name'];
		$day			= $row['day'];
		$start_time		= $row['start_time'];
		$end_time 		= $row['end_time'];
		$room_no		= $row['room_no'];

		echo $type2_lab;
	}


	 ?>
	
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
			
			<h2 style="text-align:center">Add/Edit Subjects</h2>
		
			<form method="post" name="subject_edit" action="admin_enter_subject_action.php?p=edit&subject_id=<?=$subject_id; ?>" onsubmit="subjectEdit(<?=$subject_id; ?>); return false;">
			
			<div id="left_panel">
				<div id="term">
						<b>Term</b> : 
						<select name="sel_term">
							<?php 
								$sql = "SELECT * FROM term";
								$query = mysqli_query($con, $sql);

								while($row = $query->fetch_assoc()) {
									$term_select = ($term_id == $row['ID']) ? "selected" : "";
									echo "<option value=".$row['ID']." $term_select>".$row['TERM']."</option>";
								}
							?>
						</select>
				</div>
				
				<div id="radio1">
				
					<b>Major:</b>
					
					<input type="radio" value="1" name="major" <?=($type_major == 1) ? "checked": ""; ?>>YES
					<input type="radio" value="0" name="major" <?=($type_major == 0) ? "checked": ""; ?>>NO
				
				</div>
				
				<div id="radio2">
				
					<b>Core:</b>
					
					<input type="radio" value="1" name="core" <?=($type_core == 1) ? "checked": ""; ?>>YES
					<input type="radio" value="0" name="core" <?=($type_core == 0) ? "checked": ""; ?>>NO
				
				</div>
				
				<div id="radio3">
				
					<b>Elective:</b>
					
					<input type="radio" value="1" name="elective" <?=($type_elective == 1) ? "checked": ""; ?>>YES
					<input type="radio" value="0" name="elective" <?=($type_elective == 0) ? "checked": ""; ?>>NO
					
					
				</div>
				
				<br>

				<div id="course">
						
						<b>Course</b> :
						<select name="sel_course" onchange="courseChange()">
							<?php 
								$sql = "SELECT * FROM course_table";
								$query = mysqli_query($con, $sql);
								echo "<option value='0'>-- Select Course--</option>";
								while($row = $query->fetch_assoc()) {
									$course_selected = ($course_id == $row['course_id']) ? "selected" : "";
									echo "<option value=".$row['course_id']." $course_selected>".$row['course_desc']."</option>";
								}
							?>
						</select>
					</div>

				<br>
				
				<b>Discipline</b> : 
				<div id="discipline">
					
						<?php
							include_once "fetch_discipline.php";
						?>
				</div>
				
				<br>
				
				<div id="code">
				
					<b>Subject Code:</b>
					
					<input type="text" name="subject_code" value="<?=$subject_code; ?>" style="height:30px; width:150px">
								
					
				</div>
				
				<br>
				
				<div id="code">
				
					<b>Subject Name:</b>
					
					<input type="text" name="subject_name" value="<?=$subject_name; ?>" style="height:30px; width:150px">
				
				</div>
				
				</div>
				
				<div id="right_panel">
				
				<div id="code">
				
					<b><span style="margin-left:35px">Day:</b>
					
					<input type="text" name="day" value="<?=$day; ?>" style="height:30px; width:150px" placeholder="E.g: Monday">
				
				</div>
				
				<br>
				
				<div id="code">
				
					<b>Start Time:</b>
					
					<input type="text" name="start_time" value="<?=$start_time; ?>" style="height:30px; width:150px" placeholder="HH:MM:SS">
				
				</div>
				
				<br>
				
				<div id="code">
				
					<b>End Time:</b>
					
					<input type="text" name="end_time" value="<?=$end_time; ?>" style="height:30px; width:150px" placeholder="HH:MM:SS">
				
				</div>
				
				<br>
				
				<div id="code">
				
					<b>Room No:</b>
					
					<input type="text" name="room_no" value="<?=$room_no; ?>" style="height:30px; width:150px" placeholder="E.g:A1-01">
				
				</div>
				
				
				<div id="checkbox">
				
					<input type="checkbox" name="lecture" <?=($type2_lecture == "1") ? "checked" : ""; ?>>Lecture
					<input type="checkbox" name="workshop" <?=($type2_workshop == "1") ? "checked" : ""; ?>>Workshop
					<input type="checkbox" name="Tutorial" <?=($type2_tutorial == "1") ? "checked" : ""; ?>>Tutorial
					<input type="checkbox" name="lab" <?=($type2_lab == "1") ? "checked" : ""; ?>>Lab
					
				</div>
				
				</div>
				
				<button type="submit" name="submit" style="height:30px; width:100px; font-size:15px; margin-top:20px; margin-left:100px; font-weight:bold">SUBMIT</button>
			
			
			</form>
			
			
		</div>
		
	</body>
	
</html>