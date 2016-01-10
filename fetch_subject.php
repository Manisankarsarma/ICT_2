<<<<<<< HEAD
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
	var counter = 0;
	$('input[type=checkbox]').click(function() {
		if($(this).is(':checked')) {
			console.log("checked "+$(this).val());

			counter++;
		} else {
			console.log("unchecked "+$(this).val());
			counter--;
		}

		if (counter >= 4) {
			$("input:checkbox:not(:checked)").attr('disabled', 'disabled'); //disable
		} else if (counter <=4) {
			$("input:checkbox:not(:checked)").removeAttr('disabled');
		};
		console.log(counter);

		var majorValues 	= $('input[name="check_major_subject"]:checked').map(function() { return this.value; }).get();
		var coreValues 		= $('input[name="check_core_subject"]:checked').map(function() { return this.value; }).get();
		var electiveValues 	= $('input[name="check_elective_subject"]:checked').map(function() { return this.value; }).get();

		var majorLabel 		= $('input[name="check_major_subject"]:checked').map(function() { return $(this).attr("label"); }).get();
		var coreLabel 		= $('input[name="check_core_subject"]:checked').map(function() { return $(this).attr("label"); }).get();
		var electiveLabel 	= $('input[name="check_elective_subject"]:checked').map(function() { return $(this).attr("label"); }).get();

		$("input[name=hidden_input_major]").val(majorValues);
		$("input[name=hidden_input_core]").val(coreValues);
		$("input[name=hidden_input_elective]").val(electiveValues);

		$("input[name=hidden_label_major]").val(majorLabel);
		$("input[name=hidden_label_core]").val(coreLabel);
		$("input[name=hidden_label_elective]").val(electiveLabel);
	});
</script>

<?php
//var_dump($_POST);
include "connect.php";
if (!empty($_POST)) {
	$discipline_id = $_POST['sel_discipline'];
	$course_id = $_POST['sel_course'];
	$where = "WHERE course_id = $course_id AND discipline_id = $discipline_id";
	$type_major = " AND type_major = 1";
	$type_core = " AND type_core = 1";
	$type_elective = " AND type_elective = 1";
	$main = "SELECT * FROM subject_table ";

	echo "<b>Major Subjects:</b></br></br>";

	$sql_major = $main.$where.$type_major;
	$query_major = mysqli_query($con, $sql_major);
	//var_dump($sql_major);
	while($row_major = $query_major->fetch_assoc()) {
		$text_row_major = $row_major['Subject_code']." - ".$row_major['Subject_name'];
		echo "<input type='checkbox' name='check_major_subject' value=".$row_major['SUBJECT_ID']." label='".$text_row_major."'>".$row_major['Subject_code']." - ".$row_major['Subject_name']."</input>";
		echo "</br>";
	}

	echo "</br><b>Core Subjects:</b></br></br>";

	$sql_core = $main.$where.$type_core;
	$query_core = mysqli_query($con, $sql_core);
	//var_dump($sql_major);
	while($row_core = $query_core->fetch_assoc()) {
		$text_row_core = $row_core['Subject_code']." - ".$row_core['Subject_name'];
		echo "<input type='checkbox' name='check_core_subject' value=".$row_core['SUBJECT_ID']." label='".$text_row_core."'>".$row_core['Subject_code']." - ".$row_core['Subject_name']."</input>";
		echo "</br>";
	}

		echo "</br><b>Elective Subjects:</b></br></br>";

	$sql_elective = $main.$where.$type_elective;
	$query_elective = mysqli_query($con, $sql_elective);
	//var_dump($sql_major);
	while($row_elective = $query_elective->fetch_assoc()) {
		$text_row_elective = $row_elective['Subject_code']." - ".$row_elective['Subject_name'];
		echo "<input type='checkbox' name='check_elective_subject' value=".$row_elective['SUBJECT_ID']." label='".$text_row_elective."'>".$row_elective['Subject_code']." - ".$row_elective['Subject_name']."</input>";
		echo "</br>";
	}

} else {
	$discipline_id = 0;
	$course_id = 0;
	$where = "";
	$type_major = "";
	$type_core = "";
	$main = "";
}

//var_dump($where);


?>
=======
<?php
//var_dump($_POST);
include "connect.php";
if (!empty($_POST)) {
    $discipline_id = $_POST['sel_discipline'];
    $course_id = $_POST['sel_course'];
    $where = "WHERE course_id = $course_id AND discipline_id = $discipline_id";
    $type_major = " AND type_major = 1";
    $type_core = " AND type_core = 1";
    $main = "SELECT * FROM subject_table ";

    echo "<b>Major Subjects:</b></br>";

    $sql_major = $main.$where.$type_major;
    $query_major = mysqli_query($con, $sql_major);
    //var_dump($sql_major);
    while($row_major = $query_major->fetch_assoc()) {
        echo "<input type='checkbox' name='check_major_subject' value=".$row_major['SUBJECT_ID'].">".$row_major['Subject_code']." - ".$row_major['Subject_name']."</input>";
        echo "</br>";
    }

    echo "<b>Core Subjects:</b></br>";

    $sql_core = $main.$where.$type_core;
    $query_core = mysqli_query($con, $sql_core);
    //var_dump($sql_major);
    while($row_core = $query_core->fetch_assoc()) {
        echo "<input type='checkbox' name='check_major_subject' value=".$row_core['SUBJECT_ID'].">".$row_core['Subject_code']." - ".$row_core['Subject_name']."</input>";
        echo "</br>";
    }

} else {
    $discipline_id = 0;
    $course_id = 0;
    $where = "";
    $type_major = "";
    $type_core = "";
    $main = "";
}

//var_dump($where);


?>
>>>>>>> a6d7089301d0182504668962b1572fe48b9c9e17
