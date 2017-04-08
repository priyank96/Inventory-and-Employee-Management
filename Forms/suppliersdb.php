<?php

$link = mysqli_connect("localhost", "root", "","project");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 
// Escape user inputs for security
$sup_id = mysqli_real_escape_string($link, $_REQUEST['sup_id']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$sup_fname = mysqli_real_escape_string($link, $_REQUEST['sup_fname']);
$sup_lname = mysqli_real_escape_string($link, $_REQUEST['sup_lname']);
$comp_id = mysqli_real_escape_string($link, $_REQUEST['comp_id']);

 
// attempt insert query execution
$sql = "INSERT INTO Suppliers (sup_id, phone, sup_fname, sup_lname, comp_id) VALUES ('$sup_id','$phone','$sup_fname','$sup_lname','$comp_id')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>