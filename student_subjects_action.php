<?php 
include("connect.php");
var_dump($_POST);
var_dump($_GET);


  $sel_term = $_POST['sel_term'];
  $sel_course = $_POST['sel_course'];
  $sel_disc = $_POST['sel_disc'];
  $hidden_input_major = $_POST['hidden_input_major'];
  $hidden_input_core = $_POST['hidden_input_core'];
  $hidden_input_elective = $_POST['hidden_input_elective'];

  $arr_major = explode(',', $hidden_input_major);
  var_dump($arr_major);

  $arr_core = explode(',', $hidden_input_core);
  var_dump($arr_core);

  $arr_elective = explode(',', $hidden_input_elective);
  var_dump($arr_elective);

  foreach ($arr_major as $key => $value_major) {
	$sql_insert = "INSERT INTO students_subjects (ID, term_id, course_id, discipline_id, subject_id) VALUES (1, $sel_term, $sel_course, $sel_disc, $value_major)";
	$res_insert = mysqli_query($con, $sql_insert);
	echo ($res_insert) ? "Successfully Inserted Data! Reloading Page...." : "Failed to Insert the Data! Please Try Again Later"; echo "<br>";
	echo $sql_insert;
  }

  foreach ($arr_core as $key => $value_core) {
	$sql_insert = "INSERT INTO students_subjects (ID, term_id, course_id, discipline_id, subject_id) VALUES (1, $sel_term, $sel_course, $sel_disc, $value_core)";
	$res_insert = mysqli_query($con, $sql_insert);
	echo ($res_insert) ? "Successfully Inserted Data! Reloading Page...." : "Failed to Insert the Data! Please Try Again Later"; echo "<br>";
	echo $sql_insert;
  }
  foreach ($arr_elective as $key => $value_elective) {
	$sql_insert = "INSERT INTO students_subjects (ID, term_id, course_id, discipline_id, subject_id) VALUES (1, $sel_term, $sel_course, $sel_disc, $value_elective)";
	$res_insert = mysqli_query($con, $sql_insert);
	echo ($res_insert) ? "Successfully Inserted Data! Reloading Page...." : "Failed to Insert the Data! Please Try Again Later"; echo "<br>";
	echo $sql_insert;
  }

 ?>