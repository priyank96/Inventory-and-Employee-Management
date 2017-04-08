<?php

$link = mysqli_connect("localhost", "root", "","project");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 
// Escape user inputs for security
$comp_id = mysqli_real_escape_string($link, $_REQUEST['comp_id']);
$comp_name = mysqli_real_escape_string($link, $_REQUEST['comp_name']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$pincode = mysqli_real_escape_string($link, $_REQUEST['pincode']);
$area = mysqli_real_escape_string($link, $_REQUEST['area']);
$street = mysqli_real_escape_string($link, $_REQUEST['street']);
$building = mysqli_real_escape_string($link, $_REQUEST['building']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);

 
// attempt insert query execution
$sql = "INSERT INTO Company (comp_id, comp_name) VALUES ('$comp_id', '$comp_name')";
$sql1 = "INSERT INTO CompanyLocations (comp_id, city, pincode, area, street, building) VALUES ('$comp_id', '$city' , '$pincode' , '$area' , '$street' , 'building')";
$sql2 = "INSERT INTO CompanyContacts (comp_id, comp_phone) VALUES ('$comp_id', '$phone')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

if(mysqli_query($link, $sql1)){
    echo "Records 1 added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

if(mysqli_query($link, $sql2)){
    echo "Records 2 added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>