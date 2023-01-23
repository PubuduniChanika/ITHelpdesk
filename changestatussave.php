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
$name=$_POST['name'];
$designation=$_POST['designation'];
$branch=$_POST['branch'];
$sn=$_POST['sn'];
$dcat=$_POST['dcat'];
$trouble=$_POST['trouble'];
$pn=$_POST['pn'];
$date=$_POST['date'];
$assignee=$_POST['assignee'];
$status=$_POST['status'];
$review=$_POST['review'];

if (isset($_POST['delete'])) {
       $query="delete from trouble where rno='$rno';";
}
else if (isset($_POST['update'])){    
$query="update trouble set `name`='$name',`designation`='$designation',`branch`='$branch',`sn`='$sn',`dcat`='$dcat',`trouble`='$trouble',`pn`='$pn',`date`='$date',`assignee`='$assignee',`status`='$status',`review`='$review' where `rno`='$rno'";
}
$result=mysqli_query($linkID,$query);
$n=mysqli_error($linkID);
$x=mysqli_errno($linkID);
if($x==0){
	echo '<script>alert("Record Updated/Deleted Successfully!!!")</script>';
	//echo "<center><h4  style='background-color:green;color:white;'><b>Record Saved Successfully!!!</b><h4></center>";
	include 'assignedtome.php';
	

//header("location:adduser.php");
}
else{
	echo '<script>alert("Problem Encounted!!!")</script>';
	//echo "<center><h4  style='background-color:red;color:white;'><b>Problem Encounted!!!!</b><h4></center>";
	//include 'adddevice.php';
}
	
//else echo $n;
mysqli_close($linkID);
?>
</body>
</html>
