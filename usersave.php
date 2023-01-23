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

	$name = $_POST['name'];
	$designation = $_POST['designation'];
	$uname = $_POST['uname'];
	$password = $_POST['password'];
	$ulevel = $_POST['ulevel'];

	$query = "insert into user values (NOW(),'$name','$designation','$uname','$password','$ulevel')";

	$result=mysqli_query($linkID,$query);
$n=mysqli_error($linkID);
$x=mysqli_errno($linkID);
if($x==0){
	echo '<script>alert("Record Updated/Deleted Successfully!!!")</script>';
	//echo "<center><h4  style='background-color:green;color:white;'><b>Record Saved Successfully!!!</b><h4></center>";
	include 'adduser.php';
	

//header("location:adduser.php");
}
else{
	echo '<script>alert("Problem Encounted!!!")</script>';
	include 'adduser.php';
	//echo "<center><h4  style='background-color:red;color:white;'><b>Problem Encounted!!!!</b><h4></center>";
	//include 'adddevice.php';
}
	
//else echo $n;
mysqli_close($linkID);

	?>
</body>

</html>