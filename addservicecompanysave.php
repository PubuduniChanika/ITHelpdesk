<?php
require_once 'connection.php'; 
?>
<html>
<head>
<title></title>
<style>
</style>
</head>
<body>
<?php
//print_r($_POST);
$rno=$_POST['rno'];
$service_company=$_POST['service_company'];
$acc_no=$_POST['accno'];
$amount=$_POST['amount'];
$review=$_POST['review'];



if(isset($_POST['assign'])){
	$result1=mysqli_query($linkID,"select * from assignedsc where  rno='$rno'");
	
if($result1->num_rows == 0){
	$query="insert into assignedsc values('$rno','$service_company','$acc_no','$amount','$review')";  
	
}else{

$query="update assignedsc set `service_company`='$service_company',`acc_no`='$acc_no',`amount`='$amount',`review`='$review' where `rno`='$rno'";		
}
}

$result=mysqli_query($linkID,$query);
$n=mysqli_error($linkID);
$x=mysqli_errno($linkID);
if($x==0){
	echo '<script>alert("Record Updated/Deleted Successfully!!!")</script>';
	//echo "<center><h4  style='background-color:green;color:white;'><b>Record Saved Successfully!!!</b><h4></center>";
	include 'serviceCompanyList.php';
	

//header("location:adduser.php");
}
else{
	echo '<script>alert("Problem Encounted!!!")</script>';
	include 'serviceCompanyList.php';
	//echo "<center><h4  style='background-color:red;color:white;'><b>Problem Encounted!!!!</b><h4></center>";
	//include 'adddevice.php';
}
	
//else echo $n;
mysqli_close($linkID);
?>
</body>
</html>
