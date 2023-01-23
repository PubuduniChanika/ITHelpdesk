<?php
session_start();
require_once 'connection.php';
$user=$_POST["user"];
$password=$_POST["pwd"];
$op = $_GET['op'];

if($op=="in"){
   
    $sql = mysqli_query($linkID,"SELECT * FROM user WHERE uname='$user' AND pwd='$password'");
	
    if(mysqli_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $qry = mysqli_fetch_array($sql);
        //$_SESSION['user'] = $qry['user'];
        $_SESSION['name'] = $qry['name'];
        $_SESSION['ulevel'] = $qry['ulevel'];
        if($qry['ulevel']=="IT-Director"){
            header("location:TSdashboardITD.php");
        }else if($qry['ulevel']=="IT-Incharge"){
            header("location:updatetrouble.php");
        }else if($qry['ulevel']=="IT-Member"){
            header("location:assignedtome.php");
        }else if($qry['ulevel']=="Supply"){
            header("location:adddevice.php");
        }else if($qry['ulevel']=="Accounts"){
            header("location:serviceCompanyList.php");
        }
    }else{
        echo "<center><h4  style='background-color:red;color:white;'><b>Invalid username or pasword!!!</b><h4></center>";
	    include 'login.php';
    }
}else{
    unset($_SESSION['user']);
    unset($_SESSION['ulevel']);
    header("location:login.php");
}
?>