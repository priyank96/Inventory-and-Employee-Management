<?php

$link = mysqli_connect("localhost", "root", "","project");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 
// Escape user inputs for security
$sup_id = mysqli_real_escape_string($link, $_REQUEST['sup_id']);
$prod_id = mysqli_real_escape_string($link, $_REQUEST['prod_id']);


 
// attempt insert query execution
$sql = "INSERT INTO SupplierProducts (sup_id, prod_id) VALUES ('$sup_id','$prod_id')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>