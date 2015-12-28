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
