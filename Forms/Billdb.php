<?php

$link = mysqli_connect("localhost", "root", "","project");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 
$bill_id = mysqli_real_escape_string($link, $_REQUEST['bill_id']);
$cust_id = mysqli_real_escape_string($link, $_REQUEST['cust_id']);
$bill_date = mysqli_real_escape_string($link, $_REQUEST['bill_date']);
$amt_paid = mysqli_real_escape_string($link, $_REQUEST['amt_paid']);
$amt_due = mysqli_real_escape_string($link, $_REQUEST['amt_due']);

// attempt insert query execution
$sql = "INSERT INTO Bill (bill_id, cust_id, bill_date, amt_paid, amt_due) VALUES ('$bill_id', '$cust_id' , '$bill_date' , '$amt_paid' , '$amt_due')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>