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

$query="insert into service_company values ('$scname','$bank','$accno','$branch')";

$result=mysqli_query($linkID,$query);
$n=mysqli_error($linkID);
$x=mysqli_errno($linkID);
if($x==0){
	echo '<script>alert("Record Updated/Deleted Successfully!!!")</script>';
	include 'addservicecompany.php';
	
}
else{
	echo '<script>alert("Problem Encounted!!!!")</script>';
	include 'addservicecompany.php';
}
	
//else echo $n;
mysqli_close($linkID);

?>
</body>
</html>
