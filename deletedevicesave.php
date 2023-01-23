
<html>
<head>
<title></title>
<style>
</style>
</head>
<body>

<?php
include('connection.php');
$sn=$_GET['sn'];
$query="delete from device where sn='$sn'";
//$link="";
//$dbresult=dbconnect($link,$query);
$result=mysqli_query($linkID,$query);
$row=mysqli_fetch_row($result);
$n=mysqli_error($linkID);
$x=mysqli_errno($linkID);

?>



if($x==0){
	echo "<center><h4  style='background-color:green;color:white;'><b>Record Deleted Successfully!!!</b><h4></center>";
	//include 'updatedevicesave.php';

//header("location:adduser.php");
}
else{
	echo "<center><h4  style='background-color:red;color:white;'><b>Problem Encounted!!!!</b><h4></center>";
	//include 'updatedevicesave.php';
}
	
//else echo $n;
mysqli_close($linkID);

?>
</body>
</html>
