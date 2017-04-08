<?php

$link = mysqli_connect("localhost", "root", "","project");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 
// Escape user inputs for security
$emp_id = mysqli_real_escape_string($link, $_REQUEST['emp_id']);
$month = mysqli_real_escape_string($link, $_REQUEST['month']);
$days_absent = mysqli_real_escape_string($link, $_REQUEST['days_absent']);
$dates_absent = mysqli_real_escape_string($link, $_REQUEST['dates_absent']);



$sql = "INSERT INTO Attendance(emp_id,month,days_absent,dates_absent) VALUES ('$emp_id', '$month','$days_absent', '$dates_absent')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>