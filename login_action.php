<?php 
include_once "connect.php";

$submitted_username = $_POST['username'];
$submitted_password = $_POST['password'];

//echo $submitted_username." ".$submitted_password;
$sql = "SELECT * FROM registration WHERE email = '".$submitted_username."' AND password = '".$submitted_password."'";
$q = mysqli_query($con, $sql);
$num = mysqli_num_rows($q);
//echo $num;
if ($num == 0) {
    echo "0";
} else {
    echo "1";
}

//while($row = $q->fetch_assoc()) {
//    $database_username = $row["email"];
//    $database_password = $row["password"];
//}

?>