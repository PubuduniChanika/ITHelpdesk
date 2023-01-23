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
$pn=$_POST['pn'];
$trouble=$_POST['trouble'];
$otherdes=$_POST['otherdes'];
if($trouble=='Other'){
	$query="insert into trouble(`rno`,`name`,`designation`,`branch`,`sn`,`dcat`,`trouble`,`pn`,`date`,`status`) values ('$rno','$name','$designation','$branch','$sn','$dcat','$otherdes','$pn',NOW(),'Not Assigned')";
}else{
$query="insert into trouble(`rno`,`name`,`designation`,`branch`,`sn`,`dcat`,`trouble`,`pn`,`date`,`status`) values ('$rno','$name','$designation','$branch','$sn','$dcat','$trouble','$pn',NOW(),'Not Assigned')";
}
$result=mysqli_query($linkID,$query);
$n=mysqli_error($linkID);
$x=mysqli_errno($linkID);
if($x==0){
	echo "<center><h4 style='background-color:green;color:white;'><b>Record Saved Successfully!!!</h4></center>";
	include 'index.php';

//header("location:adduser.php");
}
else{
	echo "<center><h4  style='background-color:red;color:white;'><b>Problem Encounted!!!!</b><h4></center>";
	include 'index.php';
}
	
//else echo $n;
mysqli_close($linkID);

?>
</body>
</html>
