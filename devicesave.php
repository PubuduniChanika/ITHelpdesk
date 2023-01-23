<?php
require_once('connection.php');
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

$query="insert into device (`rno`,`timestamp`,`status`,`sn`,`type`,`brand`,`model`,`pdate`,`edate`,`seller`,`branch`,`review`) values ('$rno',NOW(),'$status','$sn','$dtype','$brand','$model','$pdate','$edate','$seller','$branch','$review'
)";

$result=mysqli_query($linkID,$query);
$n=mysqli_error($linkID);
$x=mysqli_errno($linkID);
if($x==0){
	
	//echo '<script>alert("Record Save Successfully")</script>';
	//header("location:adddevice.php");
	
	echo '<script>alert("Record Added Successfully!!!")</script>';
	include 'adddevice.php';
	

//include "ureg.php";
}
else{

	echo '<script>alert("Problem Encounted!!!")</script>';
	include 'adddevice.php';
}
	
//else echo $n;
mysqli_close($linkID);

?>
</body>
</html>

