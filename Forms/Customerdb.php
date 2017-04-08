<?php

$link = mysqli_connect("localhost", "root", "","project");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 
$cust_id = mysqli_real_escape_string($link, $_REQUEST['cust_id']);
$cust_phone = mysqli_real_escape_string($link, $_REQUEST['cust_phone']);
$cust_fname = mysqli_real_escape_string($link, $_REQUEST['cust_fname']);
$cust_lname = mysqli_real_escape_string($link, $_REQUEST['cust_lname']);
$comp_id = mysqli_real_escape_string($link, $_REQUEST['comp_id']);

// attempt insert query execution
$sql = "INSERT INTO Customers (cust_id, cust_phone, cust_fname, cust_lname, comp_id) VALUES ('$cust_id', '$cust_phone' , '$cust_fname' , '$cust_lname' , '$comp_id')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>