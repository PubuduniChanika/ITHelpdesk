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
$status=$_POST['status'];
$sn=$_POST['sn'];
$dtype=$_POST['dtype'];
$brand=$_POST['brand'];
$model=$_POST['model'];
$pdate=$_POST['pdate'];
$edate=$_POST['edate'];
$seller=$_POST['seller'];
$branch=$_POST['branch'];
$review=$_POST['review'];

if (isset($_POST['delete'])) {
	$query1= "insert into deleteddevices values('$rno','$sn','$pdate','$branch','$status','$review')";
       $query="delete from device where sn='$sn'";
	   $result1=mysqli_query($linkID,$query1);
    }
else if (isset($_POST['update'])){
    
$query="update device set status='$status',sn='$sn',`timestamp`=NOW(),`type`='$dtype',`brand`='$brand',`model`='$model',`pdate`='$pdate',`edate`='$edate',`seller`='$seller',`branch`='$branch',`review`='$review' where `rno`='$rno';";
}

$result=mysqli_query($linkID,$query);
$n=mysqli_error($linkID);
$x=mysqli_errno($linkID);
if($x==0){
	echo '<script>alert("Record Updated/Deleted Successfully!!!")</script>';
	//echo "<center><h4  style='background-color:green;color:white;'><b>Record Saved Successfully!!!</b><h4></center>";
	include 'adddevice.php';
	

//header("location:adduser.php");
}
else{
	//echo '<script>alert("Problem Encounted!!!")</script>';
	echo '<script>alert("Problem Encounted!!!!")</script>';
	include 'adddevice.php';
}
	
//else echo $n;
mysqli_close($linkID);

?>
</body>
</html>
