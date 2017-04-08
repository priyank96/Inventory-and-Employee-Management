<?php

$link = mysqli_connect("localhost", "root", "");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$comp_id = mysqli_real_escape_string($link, $_REQUEST['comp_id']);
$comp_name = mysqli_real_escape_string($link, $_REQUEST['comp_name']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
 
// attempt insert query execution
$sql = "INSERT INTO Company (comp_id, comp_name) VALUES ('$comp_id', '$comp_name')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>