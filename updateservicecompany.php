<?php
require_once 'connection.php';
?>
<html>

<head>
	<title>
	</title>
</head>

<body>
	<?php include 'headerAccount.php'; ?>
	<h4>Update Service Company Details</h4>
	</br>
	<div class="form">
		<?php
		if (empty($_GET)) {
			$row = array("", "", "", "", "", "", "", "");
		} else {
			//include('connection.php');
			$scname = $_GET['servicecompany'];
			$query = "select * from service_company where `service_company`='$scname'";
			//$link="";
			//$dbresult=dbconnect($link,$query);
			$result = mysqli_query($linkID, $query);
			$row = mysqli_fetch_row($result);
		}
		?>

		<!--<h1 style="font-family:verdana;margin-left: 40px;"><b>LGN Request Form</b></h1>-->
		<form name="form" method="post" action="updateservicecompanysave.php">
			<input class="form-control" type="hidden" name="new" value="1" />
			<div class="container">
				<!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
				<div class="row">
					<div class="col-sm">
						Service Company Name
					</div>
					<div class="col-sm">
						<input value="<?php echo $row[0]; ?>" class="form-control" type="text" name="scname" required readonly />
					</div>
					<div class="col-sm">
					Bank
					</div>
					<div class="col-sm">
					<input value="<?php echo $row[1]; ?>" class="form-control" type="text" name="bank" />
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-sm">
						Bank Account No
					</div>
					<div class="col-sm">
						<input value="<?php echo $row[2]; ?>" class="form-control" type="text" name="accno" />
					</div>
					<div class="col-sm">
						Branch
					</div>
					<div class="col-sm">
						<input value="<?php echo $row[3]; ?>" class="form-control" type="text" name="branch" />
					</div>
				</div>

				<br>
				<div class="col-sm">
					<input name="update" type="submit" value="Update" class="btn btn-success btn-sm" />
					<input name="delete" type="submit" value="Delete" class="btn btn-danger btn-sm" />
				</div>
	</div>




		</form>
		<div class="row">
			<div class="col-md-12 mb-3">
				<div class="card">
					<div class="card-header">
						<span><i class="bi bi-table me-2"></i></span> Data Table
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped data-table" style="width: 100%">
								<thead>
									<tr>
										<th><strong>Service Company</strong></th>
										<th><strong>Bank Account Number</strong></th>
										<th><strong>Branch</strong></th>
										<th><strong>Update/Delete</strong></th>
									</tr>
								</thead>
								<tbody>
									<?php
									//$count=1;
									//include 'connection.php';
									$sel_query = "SELECT * FROM service_company";
									$result = mysqli_query($linkID, $sel_query);
									//return $result;
									while ($row = mysqli_fetch_assoc($result)) { ?>
										<td align="center"><?php echo $row["service_company"]; ?></td>
										<td align="center"><?php echo $row["acc_no"]; ?></td>
										<td align="center"><?php echo $row["branch"]; ?></td>
										<td>
											<a href="updateservicecompany.php?servicecompany=<?php echo $row['service_company']; ?>">Update/Delete</a>
										</td>

										</tr>
									<?php } ?>

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