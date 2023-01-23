<?php
require_once 'connection.php';
include 'headerITD.php';
?>
<html>

<head>
	<title>
	</title>
</head>

<body>
	<h4>Device History</h4>
	<div class="form">
		<button onclick="window.print()">Print this page</button>

		<!--<h1 style="font-family:verdana;margin-left: 40px;"><b>LGN Request Form</b></h1>-->
		<form name="form" method="post" action="">
			<input class="form-control" type="hidden" name="new" value="1" />
			<div class="container">
				<!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
				<div class="row">
					<div class="col-sm" style="text-align: right;padding:0.5%">
						<b>Serial No.</b>
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="sn" id="sn" placeholder="Enter serial number to get result">
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

		<div class="row">
			<div class="col-md-12 mb-3">



				<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$sn = $_POST['sn'];
					//include 'connection.php';
					$sel_query1 = "SELECT * FROM `device` WHERE `sn`='$sn'";
					$result1 = mysqli_query($linkID, $sel_query1);
					//return $result;
					while ($row = mysqli_fetch_assoc($result1)) { ?>

						<div class="row">
							<div class="col-sm">
								<b>Serial No.</b>
							</div>
							<div class="col-sm">
								<?php echo $row["sn"]; ?>
							</div>
							<div class="col-sm">
								<b>Type</b>
							</div>
							<div class="col-sm">
								<?php echo $row["type"]; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm">
								<b>Brand</b>
							</div>
							<div class="col-sm">
								<?php echo $row["brand"]; ?>
							</div>
							<div class="col-sm">
								<b>Model</b>
							</div>
							<div class="col-sm">
								<?php echo $row["model"]; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm">
								<b>Purchase date</b>
							</div>
							<div class="col-sm">
								<?php echo $row["pdate"]; ?>
							</div>
							<div class="col-sm">
								<b>Warrenty end date</b>
							</div>
							<div class="col-sm">
								<?php echo $row["edate"]; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm">
								<b>Seller</b>
							</div>
							<div class="col-sm">
								<?php echo $row["seller"]; ?>
							</div>
							<div class="col-sm">
								<b>Branch</b>
							</div>
							<div class="col-sm">
								<?php echo $row["branch"]; ?>
							</div>
						</div>
					<?php } ?>

					</tbody>

					</table>
					<div class="row">

					</div>
			</div>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-md-12 mb-3">
			<div class="card">

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" style="width: 100%">
							<thead>
								<tr>
									<th><strong>Reference No.</strong></th>
									<th><strong>Name</strong></th>
									<th><strong>Designation</strong></th>
									<th><strong>Trouble</strong></th>
									<th><strong>Phone No</strong></th>
									<th><strong>Date</strong></th>
									<th><strong>Assignee</strong></th>
									<th><strong>Service Company</strong></th>
									<th><strong>Account No.</strong></th>
									<th><strong>Amount</strong></th>
									<th><strong>Review</strong></th>
									
								</tr>
							</thead>
							<tbody>
								<?php

								$sel_query2 = "SELECT * FROM `touble_full` WHERE `status`='Assign to Service Company' AND `sn`=$sn";
								$result2 = mysqli_query($linkID, $sel_query2);
								//return $result;
								while ($row = mysqli_fetch_assoc($result2)) { ?>
									<td align="center"><?php echo $row["rno"]; ?></td>
									<td align="center"><?php echo $row["name"]; ?></td>
									<td align="center"><?php echo $row["designation"]; ?></td>
									<td align="center"><?php echo $row["trouble"]; ?></td>
									<td align="center"><?php echo $row["pn"]; ?></td>
									<td align="center"><?php echo $row["date"]; ?></td>
									<td align="center"><?php echo $row["assignee"]; ?></td>
									<!--<td align="center"><?php echo $row["status"]; ?></td>-->
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									
								</tr>
							<?php }
							} ?>

							</tbody>

						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
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