<?php
require_once 'connection.php';
//include 'headerITD.php';
?>
<html>

<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>IT-Helpdesk</title>
    <style>
        .center {
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>

<body>
<div class="container-fluid">
	
	<div class="form">
	

		<!--<h1 style="font-family:verdana;margin-left: 40px;"><b>LGN Request Form</b></h1>-->
        <div class="container-fluid">
</br>
		<form name="form" method="post" action="">
			<input class="form-control" type="hidden" name="new" value="1" />
			<div class="container">
				<!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
				<div class="row">
					<div class="col-sm" style="text-align: right;padding:0.5%">
						<b>Reference No</b>
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="rno" id="rno" placeholder="Enter reference number to get status report">
					</div>
					<div class="col-sm">
						<input name="search" type="submit" value="Search" class="btn btn-success btn-sm" />
					</div>
				</div>
				</br>

			</div>
			<div>
				<br>
				<br>
				
		</form>
</div>
		<div class="row">
			<div class="col-md-12 mb-3">



				<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$rno = $_POST['rno'];
					//include 'connection.php';
					$sel_query = "SELECT * FROM `trouble` WHERE `rno`='$rno'";
					$result = mysqli_query($linkID, $sel_query);
					if (mysqli_num_rows($result) == 0) {
                        echo "<b><p style='color:red;'>Invalid item number</p></b>";}
					while ($row = mysqli_fetch_assoc($result)) { ?>
<table class="table mx-auto" style width=30px >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">#</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>Reference No.</td>
      <td><?php echo $row["rno"]; ?></td>
      
    </tr>
    <tr>
      
      <td>Name</td>
      <td><?php echo $row["name"]; ?></td>
      
    </tr>
    <tr>
      
      <td>Designation</td>
      <td><?php echo $row["designation"]; ?></td>
      
    </tr>
    
    <tr>
      
      <td>Phone number</td>
      <td><?php echo $row["pn"]; ?></td>
      
    </tr>
    <tr>
      
      <td>date</td>
      <td><?php echo $row["date"]; ?></td>
      
    </tr>
    <tr>
      
      <td>branch</td>
      <td><?php echo $row["branch"]; ?></td>
      
    </tr>
    <tr>
      
      <td>phone number</td>
      <td><?php echo $row["pn"]; ?></td>
      
    </tr>
    <tr class="table-info">
      
      <td>status</td>
      <td><?php echo $row["status"]; ?></td>
      
    </tr>
    <tr class="table-info">
      
      <td>assignee</td>
      <td><?php echo $row["assignee"]; ?></td>
      
    </tr>

    
  </tbody>
</table>

						
					<?php }  ?>
                    <?php } ?>

            </div>
     
	</main>
	<script src="./js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
	<script src="./js/jquery-3.5.1.js"></script>
	<script src="./js/jquery.dataTables.min.js"></script>
	<script src="./js/dataTables.bootstrap5.min.js"></script>
	<script src="./js/script.js"></script>
</body>

</html>