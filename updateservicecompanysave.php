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
$scname=$_POST['scname'];
$bank=$_POST['bank'];
$accno=$_POST['accno'];
$branch=$_POST['branch'];

if (isset($_POST['delete'])) {
       $query="delete from service_company where service_company='$scname';";
    }
else if (isset($_POST['update'])){
    
$query="update service_company set `service_company`='$scname',`acc_no`='$accno',`bank`='$bank',`branch`='$branch' where service_company='$scname';";
}
$result=mysqli_query($linkID,$query);
$n=mysqli_error($linkID);
$x=mysqli_errno($linkID);
if($x==0){
	echo '<script>alert("Record Updated/Deleted Successfully!!!")</script>';
	//echo "<center><h4  style='background-color:green;color:white;'><b>Record Saved Successfully!!!</b><h4></center>";
	include 'addservicecompany.php';
	

//header("location:adduser.php");
}
else{
	echo '<script>alert("Problem Encounted!!!")</script>';
	//echo "<center><h4  style='background-color:red;color:white;'><b>Problem Encounted!!!!</b><h4></center>";
	//include 'adddevice.php';
	include 'addservicecompany.php';
}
	
//else echo $n;
mysqli_close($linkID);

?>
</body>
</html>
