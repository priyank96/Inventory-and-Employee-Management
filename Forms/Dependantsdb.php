<?php

$link = mysqli_connect("localhost", "root", "","project");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 
// Escape user inputs for security
$emp_id = mysqli_real_escape_string($link, $_REQUEST['emp_id']);
$dep_fname = mysqli_real_escape_string($link, $_REQUEST['dep_fname']);
$dep_lname = mysqli_real_escape_string($link, $_REQUEST['dep_lname']);
$dep_phone = mysqli_real_escape_string($link, $_REQUEST['dep_phone']);
$relationship = mysqli_real_escape_string($link, $_REQUEST['relationship']);


$sql = "INSERT INTO Dependants(emp_id,dep_fname,dep_lname,dep_phone,relationship) VALUES ('$emp_id', '$dep_fname','$dep_lname', '$dep_phone' ,'$relationship')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>