<?php

$link = mysqli_connect("localhost", "root", "","project");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 
// Escape user inputs for security
$emp_id = mysqli_real_escape_string($link, $_REQUEST['emp_id']);
$emp_fname = mysqli_real_escape_string($link, $_REQUEST['emp_fname']);
$emp_lname = mysqli_real_escape_string($link, $_REQUEST['emp_lname']);
$emp_phone = mysqli_real_escape_string($link, $_REQUEST['emp_phone']);
$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);
$join_date = mysqli_real_escape_string($link, $_REQUEST['join_date']);
$designation = mysqli_real_escape_string($link, $_REQUEST['designation']);
$pincode = mysqli_real_escape_string($link, $_REQUEST['pincode']);
$area = mysqli_real_escape_string($link, $_REQUEST['area']);
$street = mysqli_real_escape_string($link, $_REQUEST['street']);

// attempt insert query execution
$sql = "INSERT INTO Employee (emp_id, emp_fname, emp_lname, emp_phone, salary, join_date, designation) VALUES ('$emp_id','$emp_fname','$emp_lname','$emp_phone','$salary','$join_date','$designation')";

$sql1 = "INSERT INTO EmployeeAddresses(emp_id,pincode,area,street) VALUES ('$emp_id', '$pincode','$area','$street')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


if(mysqli_query($link, $sql1)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>