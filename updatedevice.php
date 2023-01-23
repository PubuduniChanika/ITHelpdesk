<?php
include 'headerSupply.php';
require_once 'connection.php';
?>
<html>

<head>
	<title>
	</title>
</head>

<body>

	<h4>Update Device</h4>
	<div class="form">
		<?php
		if (empty($_GET)) {
			$row = array("", "", "", "", "", "", "", "", "", "", "", "");
		} else {
			//include('connection.php');
			$sn = $_GET['sn'];
			$query = "select * from device where sn='$sn'";
			//$link="";
			//$dbresult=dbconnect($link,$query);
			$result = mysqli_query($linkID, $query);
			$row = mysqli_fetch_row($result);
		}
		?>

		<!--<h1 style="font-family:verdana;margin-left: 40px;"><b>LGN Request Form</b></h1>-->
		<form name="form" method="post" action="updatedevicesave.php">
			<input class="form-control" type="hidden" name="new" value="1" />
			<div class="container">
				<!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
				<div class="row">
					<div class="col-sm">
						Reference No.
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" value="<?php echo $row[0]; ?>" name="rno" placeholder="Enter Reference No." required />
					</div>
					<div class="col-sm">
						<div class="col-sm">
							Status
						</div>
					</div>
					<div class="col-sm">
						<select class="form-control" id="status" name="status">
							<option <?php
									if ($row[2] == 'In Use') {
										echo 'selected';
									}
									?>>In Use</option>
							<option <?php
									if ($row[2] == 'Not In Use') {
										echo 'selected';
									}
									?>>Not In Use</option>
									<option <?php
									if ($row[2] == 'Not Assigned') {
										echo 'selected';
									}
									?>>Not Assigned</option>
									<option <?php
									if ($row[2] == 'Cannot Repair') {
										echo 'selected';
									}
									?>>Cannot Repair</option>
									
						</select>
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-sm">
						Serial No.
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" value="<?php echo $row[3]; ?>" name="sn" placeholder="Enter Serial No." required />
					</div>
					<?php
					$query = "SELECT type FROM devicetype";
					$result = $linkID->query($query);
					if ($result->num_rows > 0) {
						$options = mysqli_fetch_all($result, MYSQLI_ASSOC);
					}
					?>
					<div class="col-sm">
						Type of Device
					</div>
					<div class="col-sm">
						<select class="form-control" id="dtype" name="dtype">

							<option disabled="disabled" selected="selected">Choose option</option>
							<?php
							//$x=$row[9];
							foreach ($options as $option) {
							?>
								<option <?php
										if ($row[4] == $option['type']) {
											echo 'selected';
										} ?>>
									<?php echo $option['type'];	?>
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
						Brand
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="brand" placeholder="Enter Brand" value="<?php echo $row[5]; ?>" />
					</div>
					<div class="col-sm">
						Model
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="model" placeholder="Enter Model" value="<?php echo $row[6]; ?>" />
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-sm">
						Purchase Date
					</div>
					<div class="col-sm">
						<input class="form-control" type="date" name="pdate" value="<?php echo $row[7]; ?>" />
					</div>
					<div class="col-sm">
						Warrenty End Date
					</div>
					<div class="col-sm">
						<input class="form-control" type="date" name="edate" value="<?php echo $row[8]; ?>" />
					</div>
				</div>
				</br>

				<div class="row">
					<div class="col-sm">
						Seller-Company
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="seller" placeholder="Enter Seller" value="<?php echo $row[9]; ?>" />
					</div>
					<div class="col-sm">
						Branch
					</div>
					<?php
					$query = "SELECT branch FROM branch";
					$result = $linkID->query($query);
					if ($result->num_rows > 0) {
						$options = mysqli_fetch_all($result, MYSQLI_ASSOC);
					}
					?>
					<div class="col-sm">
						<select class="form-control" name="branch" required>
							<option disabled="disabled" selected="selected">Choose option</option>

							<?php
							//$x=$row[9];
							foreach ($options as $option) {
							?>
								<option <?php
										if ($row[10] == $option['branch']) {
											echo 'selected';
										} ?>>
									<?php echo $option['branch'];	?>
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
						Review
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="review" placeholder="Enter Review" value="<?php echo $row[11]; ?>" />
					</div>
					<div class="col-sm">

					</div>
					<div class="col-sm">

					</div>
				</div>
				</br>

				<div class="col-sm">
					<input name="update" type="submit" value="Update" class="btn btn-success btn-sm" />
					<input name="delete" type="submit" value="Delete" class="btn btn-danger btn-sm" />
				</div>

			</div>
			<div>

				<br>
				<br>


				<br>
				<br>
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
										<th><strong>Ref No.</strong></th>
										<th><strong>Status</strong></th>
										<th><strong>Timestamp</strong></th>
										<th><strong>Serial No.</strong></th>
										<th><strong>Type of Device</strong></th>
										<th><strong>Brand</strong></th>
										<th><strong>Model</strong></th>
										<!--<th><strong>Purchase Date</strong></th>
						<th><strong>Warrenty End Date</strong></th>
						<th><strong>Seller-Company</strong></th>-->
										<th><strong>Branch</strong></th>
										<th><strong>Review</strong></th>
										<th><strong>Update/Delete</strong></th>



									</tr>
								</thead>
								<tbody>
									<?php
									$count = 1;
									include 'connection.php';
									$sel_query = "SELECT * FROM `device`";
									$result = mysqli_query($linkID, $sel_query);
									//return $result;
									while ($row = mysqli_fetch_assoc($result)) { ?>
										<td align="center"><?php echo $row["rno"]; ?></td>
										<td align="center"><?php echo $row["status"]; ?></td>
										<td align="center"><?php echo $row["timestamp"]; ?></td>
										<td align="center"><?php echo $row["sn"]; ?></td>
										<td align="center"><?php echo $row["type"]; ?></td>
										<td align="center"><?php echo $row["brand"]; ?></td>
										<td align="center"><?php echo $row["model"]; ?></td>
										<!--<td align="center"><?php echo $row["pdate"]; ?></td>
						<td align="center"><?php echo $row["edate"]; ?></td>
						<td align="center"><?php echo $row["seller"]; ?></td>-->
										<td align="center"><?php echo $row["branch"]; ?></td>
										<td align="center"><?php echo $row["review"]; ?></td>
										<td align="center">
											<a href="updatedevice.php?sn=<?php echo $row['sn']; ?>">Update/Delete</a>
										</td>

										</tr>
									<?php } ?>

								</tbody>
								<tfoot>
									<tr>
										<th><strong>Ref No.</strong></th>
										<th><strong>Status</strong></th>
										<th><strong>Timestamp</strong></th>
										<th><strong>Serial No.</strong></th>
										<th><strong>Type of Device</strong></th>
										<th><strong>Brand</strong></th>
										<th><strong>Model</strong></th>
										<!--<th><strong>Purchase Date</strong></th>
						<th><strong>Warrenty End Date</strong></th>
						<th><strong>Seller-Company</strong></th>-->
										<th><strong>Branch</strong></th>
										<th><strong>Review</strong></th>
										<th><strong>Update/Delete</strong></th>

									</tr>
								</tfoot>
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
	<script>
		$('#example').DataTable({
			order: [2, 'desc']
		});
	</script>
</body>

</html>