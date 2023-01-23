<?php 
require_once 'connection.php'; 
include 'headerAccount.php';
?>
<html>
<head>
<title>
</title>
<script src=
		"https://code.jquery.com/jquery-3.2.1.min.js">
	</script>

</head>

<body>
<h4>Trouble: Assign to a Service Company</h4>
<div class="form">
<?php
if(empty($_GET)){
    $row=array("","","","","","","","","","","","","");
}
else{
$rno=$_GET['rno'];
$query="select * from trouble where rno='$rno'";
//$link="";
//$dbresult=dbconnect($link,$query);
$result=mysqli_query($linkID,$query);
$row=mysqli_fetch_row($result);
}
?>

<!--<h1 style="font-family:verdana;margin-left: 40px;"><b>LGN Request Form</b></h1>-->
<form name="form" method="post" action="addservicecompanysave.php"> 
<input type="hidden" name="new" value="1" />
<div class="container">
<!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
<div class="row">
    <div class="col-sm">
	Reference No.
	</div>
	<div class="col-sm">
	<input type="text" name="rno" value="<?php echo $row[0];?>" required readonly />
	</div>
	<div class="col-sm">
	Name
	</div>
	<div class="col-sm">
	<input type="text" name="name" value="<?php echo $row[1];?>" required disabled/>
	</div>
</div>
</br>
<div class="row">
    <div class="col-sm">
	Designation
	</div>
	<div class="col-sm">
		
		<select name="designation" disabled>
            <option disabled="disabled" selected="selected">Choose option</option>
            <option value="Additional Secretary"
			<?php
	  			if($row[2]=='Additional Secretary'){
		  		echo 'selected';
	  			}
	  		?>
			>Additional Secretary</option>
			<option value="Senior Assistant Secretary"
			<?php
	  			if($row[2]=='Senior Assistant Secretary'){
		  		echo 'selected';
	  			}
	  		?>
			>Senior Assistant Secretary</option>
			<option value="Directer"
			<?php
	  			if($row[2]=='Directer'){
		  		echo 'selected';
	  			}
	  		?>
			>Directer</option>
			<option value="Assistant Secretary"
			<?php
	  			if($row[2]=='Assistant Secretary'){
		  		echo 'selected';
	  			}
	  		?>
			>Assistant Secretary</option>
			<option value="Legal Officer"
			<?php
	  			if($row[2]=='Legal Officer'){
		  		echo 'selected';
	  			}
	  		?>
			>Legal Officer</option>
			<option value="Administrative Officer"
			<?php
	  			if($row[2]=='Administrative Officer'){
		  		echo 'selected';
	  			}
	  		?>
			>Administrative Officer</option>
			<option value="Development Officer"
			<?php
	  			if($row[2]=='Development Officer'){
		  		echo 'selected';
	  			}
	  		?>
			>Development Officer</option>
			<option value="Management Service Officer"
			<?php
	  			if($row[2]=='Management Service Officer'){
		  		echo 'selected';
	  			}
	  		?>
			>Management Service Officer</option>
			<option value="Office Assistant"
			<?php
	  			if($row[2]=='Office Assistant'){
		  		echo 'selected';
	  			}
	  		?>
			>Office Assistant</option>
			<option value="Trainee"
			<?php
	  			if($row[2]=='Trainee'){
		  		echo 'selected';
	  			}
	  		?>
			>Trainee</option>
        </select>
	</div>
	<div class="col-sm">
	Branch
	</div>
	<div class="col-sm">
		<select name="branch" required disabled>
            <option disabled="disabled" selected="selected">Choose option</option>
            <option value="Administration"
			<?php
	  			if($row[3]=='Administration'){
		  		echo 'selected';
	  			}
	  		?>
			>Administration</option>
			<option value="Legal" dissabled
			<?php
	  			if($row[3]=='Legal'){
		  		echo 'selected';
	  			}
	  		?>
			>Legal</option>
			<option value="Accounts"
			<?php
	  			if($row[3]=='Accounts'){
		  		echo 'selected';
	  			}
	  		?>
			>Accounts</option>
			<option value="Reforms"
			<?php
	  			if($row[3]=='Reforms'){
		  		echo 'selected';
	  			}
	  		?>
			>Reforms</option>
			<option value="Development"
			<?php
	  			if($row[3]=='Development'){
		  		echo 'selected';
	  			}
	  		?>
			>Development</option>
			<option value="Planning"
			<?php
	  			if($row[3]=='Planning'){
		  		echo 'selected';
	  			}
	  		?>
			>Planning</option>
        </select>
	</div>
</div>
</br>
<div class="row">
    <div class="col-sm">
	Device Serial No
	</div>
	<div class="col-sm">
	<input type="text" name="sn" value="<?php echo $row[4];?>"  disabled />
	</div>
	<div class="col-sm">
	Category
	</div>
	<div class="col-sm">
	<select name="dcat" required disabled>
        <option disabled="disabled" selected="selected">Choose option</option>
        <option value="Desktop"
			<?php
	  			if($row[5]=='Desktop'){
		  		echo 'selected';
	  			}
	  		?>
		>Desktop</option>
		<option value="Laptop"
			<?php
	  			if($row[5]=='Laptop'){
		  		echo 'selected';
	  			}
	  		?>
		>Laptop</option>
		<option value="Printer"
			<?php
	  			if($row[5]=='Printer'){
		  		echo 'selected';
	  			}
	  		?>
		>Printer</option>
		<option value="Other"
		<?php
	  			if($row[5]=='Other'){
		  		echo 'selected';
	  			}
	  		?>
		>Other</option>
    </select>
	</div>
</div>
</br>
<div class="row">
    <div class="col-sm">
	Trouble
	</div>
	<div class="col-sm">
	<input type="text" name="trouble" value="<?php echo $row[6];?>" disabled  />
	</div>
	<div class="col-sm">
	Phone no.
	</div>
	<div class="col-sm">
	<input type="text" name="pn" value="<?php echo $row[7];?>" disabled />
	</div>
</div>
</br>
<div class="row">
    <div class="col-sm">
	Date
	</div>
	<div class="col-sm">
	<input type="text" name="date" value="<?php if(isset($row[8])){ echo $row[8];}?>" disabled  />
	</div>
	<div class="col-sm">
	Assignee
	</div>
	<div class="col-sm">
	<?php 
    $query ="SELECT name FROM user";
    $result = $linkID->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<select name="assignee" disabled>
   <option>Choose option</option>
  <?php 
  //$x=$row[9];
  foreach ($options as $option) {
  ?>
    <option value=<?php echo $option['name'];?>
	<?php if($row[9]==$option['name']){
		echo 'selected';
		}?>>
	<?php echo $option['name'];	?>
	</option>
<?php 
    }
   ?>
</select>
</div>
</div>
</br>
<div class="row">

	<div class="col-sm">
	Status
	</div>
	<div class="col-sm">
		<select name="status" required disabled>
            <option disabled="disabled" selected="selected">Choose option</option>
            <option value="Assigned"
			<?php
	  			if($row[10]=='Assigned'){
		  		echo 'selected';
	  			}
	  		?>
			>Assigned</option>
			<option value="Done!!!"
			<?php
	  			if($row[10]=='Done!!!'){
		  		echo 'selected';
	  			}
	  		?>
			>Done!!!</option>
			<option value="Assign to Service Company"
			<?php
	  			if($row[10]=='Assign to Service Company'){
		  		echo 'selected';
	  			}
	  		?>
			>Assign to Service Company</option>
			<option value="Cannot Repair"
			<?php
	  			if($row[10]=='Cannot Repair'){
		  		echo 'selected';
	  			}
	  		?>
			>Cannot Repair</option>
        </select>
	</div>
    <div class="col-sm">
	
	</div>
    <div class="col-sm">
	
	</div>
    </div>
    </br>
    <div class="row">
    <div class="col-sm">
	Service Company
	</div>
	<div class="col-sm">
	<?php 
    $query ="SELECT `service_company` FROM `service_company`";
    $result = $linkID->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>
	<select name="service_company" id="service_company" onkeyup="GetDetail(this.value)">
   <option>Choose option</option>
  <?php 
  //$x=$row[9];
  foreach ($options as $option) {
  ?>
    <option value=<?php echo $option['service_company'];?>
	<?php /*if($row[11]==$option[`service_company`]){
		echo 'selected';
		}*/?>>
	<?php echo $option['service_company'];	?>
	</option>
<?php 
    }
   ?>
</select>
<p style="color:32A80F" id="result" align="center">
	</div>
	
	<div class="col-sm">
	Bank Account No
	</div>
	<div class="col-sm">
		
	<input type="text" name="name" id="accno" value="<?php echo $row[1];?>" required />
	</div>
    </div>
    </br>

    <div class="row">
    <div class="col-sm">
	<input name="update" type="submit" value="Update" class="btn btn-success btn-sm" />
	<input name="delete" type="submit" value="Delete" class="btn btn-danger btn-sm" />
	</div>
	<div class="col-sm">
	</div>
	<div class="col-sm">
	</div>
	<div class="col-sm">
	</div>
    </div>
    </br>
	<div class="col-sm">
	
	</div>
	<div class="col-sm">
	</div>
    </div>
</br>
	
	
</div>
<div>
<br>
<br>
</form>

	


    </main>
    <script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("accno").value = "";
				//document.getElementById("last_name").value = "";
				return;
			}
			else {

				

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "gfg.php?service_company=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>