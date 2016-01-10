<?php
	
	include("connect.php");

	
	session_start();

	if(isset($_POST['Submit']))
	{
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
	
	}

?>

<!DOCTYPE html>

<html>

	<head>
	
		<title>JCU Online Timetable</title>
		
		<link type="text/css" rel="stylesheet" href="Index.css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		
		<style>
		
			.container
			{
				/*height: 400px;*/
				padding: 50px;
			}
			
			#TimeTable, table, th, td {
				border: 1px solid black;
			}
			
		</style>
		
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

			function formStudent() {
				var data = $("form[name=form_studentsubject]").serialize();
				var link = "student_subjects_action.php";
				var success = function(response) {
					alert(response);
				}

				$.post(link, data, success, "html");
				console.log(data);
			}
		</script>
		
	</head>
	
	<body>
	
		<div class="wrapper">
		
			<div id="logo">
				
				<a href="Index.php"><img src="Images/JCUSColourLogo.png"></a>
			
			</div>
			
			<div id="main_title">
			
				ONLINE TIMETABLE SYSTEM
				
			</div>
			
		</div>
		
			<div class="top_nav">
			
				<ul>
				
					<li><a href="Index.php">Home</a></li>
					<li><a href="#">Logged in as..</a></li>
					<li><a href="login.php">Logout</a></li>
					
				</ul>
				
			</div>
			
		
		
		<div class="container">
			<h1>Course Summary</h1>
			<?php 

				include("connect.php");

				// fetching the general information
				$sel_term = $_POST['sel_term'];
				$sel_course = $_POST['sel_course'];
				$sel_disc = $_POST['sel_disc'];
				$hidden_input_major = $_POST['hidden_input_major'];
				$hidden_input_core = $_POST['hidden_input_core'];
				$hidden_input_elective = $_POST['hidden_input_elective'];

				$hidden_label_major = $_POST['hidden_label_major'];
				$hidden_label_core = $_POST['hidden_label_core'];
				$hidden_label_elective = $_POST['hidden_label_elective'];

				$arr_major = explode(',', $hidden_input_major);
				$arr_core = explode(',', $hidden_input_core);
				$arr_elective = explode(',', $hidden_input_elective);

				foreach ($arr_major as $key => $value) {
					if(empty($value)) {
						unset($arr_major[$key]);
					}
				}

				foreach ($arr_core as $key => $value) {
					if(empty($value)) {
						unset($arr_core[$key]);
					}
				}

				foreach ($arr_elective as $key => $value) {
					if(empty($value)) {
						unset($arr_elective[$key]);
					}
				}

				// var_dump($arr_major); echo "<br>";
				// var_dump($arr_core); echo "<br>";
				// var_dump($arr_elective); echo "<br>";	

				$arr_lblmajor = explode(',', $hidden_label_major);
				$arr_lblcore = explode(',', $hidden_label_core);
				$arr_lblelective = explode(',', $hidden_label_elective);

				$arr_label = array_merge($arr_lblmajor, $arr_lblcore, $arr_lblelective);
				$arr_type = array_merge($arr_major, $arr_core, $arr_elective);

				// var_dump($arr_type);

				$sql_term = "SELECT * FROM term WHERE ID = ".$sel_term;
				$query_term = mysqli_query($con, $sql_term);
				while($row_term = $query_term->fetch_assoc()) {
					$term = $row_term['TERM'];
				}	

				$sql_term = "SELECT * FROM term WHERE ID = ".$sel_term;
				$query_term = mysqli_query($con, $sql_term);
				while($row_term = $query_term->fetch_assoc()) {
					$term = $row_term['TERM'];
				}

				$sql_course = "SELECT * FROM course_table WHERE course_id = ".$sel_course;
				$query_course = mysqli_query($con, $sql_course);
				while($row_course = $query_course->fetch_assoc()) {
					$course_desc = $row_course['course_desc'];
				}

				$sql_discipline = "SELECT * FROM discipline_table WHERE discipline_id = ".$sel_disc;
				$query_discipline = mysqli_query($con, $sql_discipline);
				while($row_discipline = $query_discipline->fetch_assoc()) {
					$discipline_desc = $row_discipline['discipline_name'];
				}


				//fetching the timetable from the database
					$i = 0;
				foreach ($arr_type as $key => $subject_id) {
					$sql_type = "SELECT * FROM subject_table WHERE SUBJECT_ID = ".$subject_id;
					$query_type = mysqli_query($con, $sql_type);
					while ($row_type = $query_type->fetch_assoc()) {
						$subject_info[$i]['id'] = $subject_id;
						$subject_info[$i]['day'] = $row_type['day'];
						$subject_info[$i]['begin'] = $row_type['start_time'];
						$subject_info[$i]['end'] = $row_type['end_time'];
						$duration = strtotime($row_type['end_time']) - strtotime($row_type['start_time']);
						$subject_info[$i]['dur'] = $duration / 60;
						$i++;
						
					}
				}

				?>
				<table id="TimeTable" style="padding-top:0px">
					<tr>
						<td>Term</td>
						<td colspan="5"><?=$term; ?></td>
					</tr>
					<tr>
						<td>Course</td>
						<td colspan="5"><?=$course_desc; ?></td>
					</tr>
					<tr>
						<td>Discipline</td>
						<td colspan="5"><?=$discipline_desc; ?></td>
					</tr>
					<tr>
						<td rowspan="5">Subjects</td>
					</tr>
						<?php 
						foreach ($arr_label as $key => $value) { ?>
							<tr>
								<td colspan="5"><?=$value; ?></td>
							</tr>	
						<?php } ?>
						
					<tr style="border: 1px solid black;">
						<td style="width:100px; padding-right:10px;">TIME</td>
						<td style="width:160px; padding-right:10px;">Monday</td>
						<td style="width:160px; padding-right:10px;">Tuesday</td>
						<td style="width:160px; padding-right:10px;">Wednesday</td>
						<td style="width:160px; padding-right:10px;">Thursday</td>
						<td style="width:160px; padding-right:10px;">Friday</td>
					</tr>
				
						<?php
						
						// time list insertion
						$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
						for ($i=0; $i < count($days); $i++) { 
							for ($k=0; $k < count($subject_info); $k++) {
							$init_start_time = strtotime("09:00");
							$init_end_time = strtotime("09:50");

								if ($days[$i] == $subject_info[$k]['day']) {
									// echo $days[$i]." ".$subject_info[$k]['day']; echo "<br>";
									for ($m=0; $m < 11; $m++) { 
										$init_time[$m] = date("H:i", $init_start_time)." - ".date("H:i", $init_end_time);

										if ($init_start_time >= strtotime($subject_info[$k]['begin']) && $init_end_time <= strtotime($subject_info[$k]['end'])) {
											$timeslot[$days[$i]][$m] = '<td style="background-color: green; color:white;">'.$arr_label[$k].'</td>'; echo "<br>";
											// $timeslot[$subject_info[$k]['id']][$days[$i]][$m] = '<td style="background-color: green; color:white;">'.$arr_label[$k].'</td>'; echo "<br>";
										} 

										$init_start_time += 3600;
										$init_end_time += 3600;
									} 
																	
								}
							}
						}

						// $table_data = array($init_time, $timeslot);
						// echo "<pre>";
						// print_r($table_data);
						// echo "</pre>";

						for ($i=0; $i < 11; $i++) { 
							echo "<tr height='50'><td>".$init_time[$i]."</td>";

							if (isset($timeslot['Monday'])) {
								echo (array_key_exists($i, $timeslot['Monday'])) ? $timeslot['Monday'][$i] : "<td></td>";
							} else {
								echo "<td></td>";
							} 

							if (isset($timeslot['Tuesday'])) {
								echo (array_key_exists($i, $timeslot['Tuesday'])) ? $timeslot['Tuesday'][$i] : "<td></td>";
							} else {
								echo "<td></td>";
							}

							if (isset($timeslot['Wednesday'])) {
								echo (array_key_exists($i, $timeslot['Wednesday'])) ? $timeslot['Wednesday'][$i] : "<td></td>";
							} else {
								echo "<td></td>";
							}

							if (isset($timeslot['Thursday'])) {
								echo (array_key_exists($i, $timeslot['Thursday'])) ? $timeslot['Thursday'][$i] : "<td></td>";
							} else {
								echo "<td></td>";
							}

							if (isset($timeslot['Friday'])) {
								echo (array_key_exists($i, $timeslot['Friday'])) ? $timeslot['Friday'][$i] : "<td></td>";
							} else {
								echo "<td></td>";
							}

							echo "</tr>";

						}
						?>
				</table>
				<form method="post" name="form_studentsubject" action="student_subjects_action.php" onsubmit="formStudent(); return false;">
					<input type="hidden" name="hidden_sel_term" value="<?=$sel_term; ?>">
					<input type="hidden" name="hidden_sel_course" value="<?=$sel_course; ?>">
					<input type="hidden" name="hidden_sel_disc" value="<?=$sel_disc; ?>">

					<input type="hidden" name="hidden_input_major" value="<?=$hidden_input_major; ?>">
					<input type="hidden" name="hidden_input_core" value="<?=$hidden_input_core; ?>">
					<input type="hidden" name="hidden_input_elective" value="<?=$hidden_input_elective; ?>">

					<input type="hidden" name="hidden_label_major" value="<?=$hidden_label_major; ?>">
					<input type="hidden" name="hidden_label_core" value="<?=$hidden_label_core; ?>">
					<input type="hidden" name="hidden_label_elective" value="<?=$hidden_label_elective; ?>">

					<input type="submit" value="Submit" />
				</form>
			</div>
	</body>
	
</html>