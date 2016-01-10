<?php 
include("connect.php");

if (isset($_GET) && $_GET['p'] == 'new') {
	if (isset($_POST) && !empty($_POST)) {
		// get the data and store it in the variable
		$sel_term 		= (int)$_POST['sel_term'];
		$major 			= (int)$_POST['major'];
		$core 			= (int)$_POST['core'];
		$elective 		= (int)$_POST['elective'];
		$sel_course 	= (int)$_POST['sel_course'];
		$sel_disc 		= (int)$_POST['sel_disc'];
		$subject_code 	= $_POST['subject_code'];
		$subject_name 	= $_POST['subject_name'];
		$day			= $_POST['day'];
		$start_time		= $_POST['start_time'];
		$end_time 		= $_POST['end_time'];
		$room_no 		= $_POST['room_no'];

		if (isset($_POST['lecture'])) {
			$lecture =  1;
		} else {
			$lecture =  0;
		}

		if (isset($_POST['workshop'])) {
			$workshop =  1;
		} else {
			$workshop =  0;
		}

		if (isset($_POST['Tutorial'])) {
			$tutorial =  1;
		} else {
			$tutorial =  0;
		}

		if (isset($_POST['lab'])) {
			$lab =  1;
		} else {
			$lab =  0;
		}

		$sql_insert = "INSERT INTO subject_table 
						(
							course_id
							, discipline_id
							, Term_ID
							, type_major
							, type_core
							, type_elective
							, type2_lecture
							, type2_workshop
							, type2_tutorial
							, type2_lab
							, Subject_code
							, Subject_name
							, day
							, start_time
							, end_time
							, room_no
						) VALUES 
						(
							$sel_course
							, $sel_disc
							, $sel_term
							, $major
							, $core
							, $elective
							, $lecture
							, $workshop
							, $tutorial
							, $lab
							, '$subject_code'
							, '$subject_name'
							, '$day'
							, '$start_time'
							, '$end_time'
							, '$room_no'
						)";
		
		$res_insert = mysqli_query($con, $sql_insert);

		if ($res_insert) {
			echo "Successfully Inserted Data! Reloading Page....";
		} else {
			echo "Failed to Insert the Data! Please Try Again Later";
		}
	}
} else if (isset($_GET) && $_GET['p'] == 'delete') {
	$subject_id = $_POST['subject_id'];
	$sql = "DELETE FROM subject_table WHERE SUBJECT_ID = $subject_id LIMIT 1";
	$res_delete = mysqli_query($con, $sql);

	// var_dump($_GET); var_dump($_POST); var_dump($sql);
	if ($res_delete) {
		echo "SUccessfully deleted the data! Reloading Page...";
	} else {
		echo "Failed to Delete the Data! Please Try Again Later...";
	}
} else if (isset($_GET) && $_GET['p'] == 'edit') {
	// var_dump($_GET);
	// var_dump($_POST);
	$subject_id = $_GET['subject_id'];

	$sel_term 		= (int)$_POST['sel_term'];
	$major 			= (int)$_POST['major'];
	$core 			= (int)$_POST['core'];
	$elective 		= (int)$_POST['elective'];
	$sel_course 	= (int)$_POST['sel_course'];
	$sel_disc 		= (int)$_POST['sel_disc'];
	$subject_code 	= $_POST['subject_code'];
	$subject_name 	= $_POST['subject_name'];
	$day			= $_POST['day'];
	$start_time		= $_POST['start_time'];
	$end_time 		= $_POST['end_time'];
	$room_no 		= $_POST['room_no'];

	if (isset($_POST['lecture'])) {
		$lecture =  1;
	} else {
		$lecture =  0;
	}

	if (isset($_POST['workshop'])) {
		$workshop =  1;
	} else {
		$workshop =  0;
	}

	if (isset($_POST['Tutorial'])) {
		$tutorial =  1;
	} else {
		$tutorial =  0;
	}

	if (isset($_POST['lab'])) {
		$lab =  1;
	} else {
		$lab =  0;
	}

	$sql_update = "UPDATE subject_table 
					SET
						course_id = $sel_course
						, discipline_id = $sel_disc
						, Term_ID = $sel_term
						, type_major = $major
						, type_core = $core
						, type_elective = $elective
						, type2_lecture = $lecture
						, type2_workshop = $workshop
						, type2_tutorial = $tutorial
						, type2_lab = $lab
						, Subject_code = '$subject_code'
						, Subject_name = '$subject_name'
						, day = '$day'
						, start_time = '$start_time'
						, end_time = '$end_time'
						, room_no = '$room_no'
					WHERE 
						subject_id = $subject_id 
					LIMIT 1 
						";
	
	$res_update = mysqli_query($con, $sql_update);

	if ($res_update) {
		echo "Successfully Updated Data! Back to the Front Page....";
	} else {
		echo "Failed to Update the Data! Please Try Again Later";
	}
}



 ?>