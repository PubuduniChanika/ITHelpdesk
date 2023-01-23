<?php
include('connection.php');
// Get the user id
$service_company = $_REQUEST['service_company'];

// Database connection
//$con = mysqli_connect("localhost", "root", "", "ts");

if ($service_company !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($linkID, "SELECT acc_no
	FROM service_company WHERE service_company='$service_company'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$acc_no = $row["acc_no"];

}

// Store it in a array
$result = array("$acc_no");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>