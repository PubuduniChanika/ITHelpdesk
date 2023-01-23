<?php
include 'headerSupply.php';
require_once 'connection.php'
?>
<html>

<head>
	<title>
	</title>
	<script>
		$(document).ready(function() {
			$('#example').DataTable({
				paging: false,
				ordering: false,
				info: false,
			});
		});
	</script>
</head>

<body>
	<h4>Add Device</h4>
	<div class="form">
		<!--<h1 style="font-family:verdana;margin-left: 40px;"><b>LGN Request Form</b></h1>-->
		<form name="form" method="post" action="devicesave.php">
			<input type="hidden" name="new" value="1" />
			<div class="container">
				<!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
				<div class="row">
					<div class="col-sm">
						Reference No.
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="rno" placeholder="Enter Reference No." required />
					</div>
					<div class="col-sm">
						Status
					</div>
					<div class="col-sm">
						<select class="form-control" id="status" name="status">
							<option selected="selected">In Use</option>
							<option>Not In Use</option>
							<option>Not Assigned</option>
							<option>Cannot Repair</option>
						</select>
					</div>
				</div>
				</br>
				</hr>
				<div class="row">
					<div class="col-sm">
						Serial No.
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="sn" placeholder="Enter Serial No." required />
					</div>
					<?php
					$query = "SELECT type FROM deviceType";
					$result = $linkID->query($query);
					if ($result->num_rows > 0) {
						$options = mysqli_fetch_all($result, MYSQLI_ASSOC);
					}
					?>
					<div class="col-sm">
						Type of Device
					</div>
					<div class="col-sm">
						<select class="form-control" id="dtype" name="dtype" required>

							<option value="" disabled="disabled" selected="selected">Choose option</option>
							<?php

							foreach ($options as $option) {
							?>
								<option>
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
						<input class="form-control" type="text" name="brand" placeholder="Enter Brand" required />
					</div>
					<div class="col-sm">
						Model
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="model" placeholder="Enter Model" />
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-sm">
						Purchase Date
					</div>
					<div class="col-sm">
						<input class="form-control" type="date" name="pdate" />
					</div>
					<div class="col-sm">
						Warrenty End Date
					</div>
					<div class="col-sm">
						<input class="form-control" type="date" name="edate" />
					</div>
				</div>
				</br>

				<div class="row">
					<div class="col-sm">
						Seller-Company
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="seller" placeholder="Enter Seller" />
					</div>
					<?php
					$query = "SELECT branch FROM branch";
					$result = $linkID->query($query);
					if ($result->num_rows > 0) {
						$options = mysqli_fetch_all($result, MYSQLI_ASSOC);
					}
					?>
					<div class="col-sm">
						Branch

					</div>
					<div class="col-sm">
						<select class="form-control" name="branch" required>
							<option disabled="disabled" selected="selected" value="">Choose option</option>
							<?php
							//$x=$row[9];
							foreach ($options as $option) {
							?>
								<option>
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
						<input class="form-control" type="text" name="review" placeholder="Enter Review" />
					</div>
					<div class="col-sm">

					</div>
					<div class="col-sm">

					</div>
				</div>
				</br>


				</br>

				<div class="col-sm">
					<input name="submit" type="submit" value="Add Device" class="btn btn-success btn-sm" />
				</div>

			</div>
			<div>

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
										<th><strong>Timestamp</strong></th>
										<th><strong>Status</strong></th>
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

									$sel_query = "SELECT * FROM `device`";
									$result = mysqli_query($linkID, $sel_query);
									//return $result;
									while ($row = mysqli_fetch_assoc($result)) { ?>
										<td align="center"><?php echo $row["rno"]; ?></td>
										<td align="center"><?php echo $row["timestamp"]; ?></td>
										<td align="center"><?php echo $row["status"]; ?></td>
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
									<tr>
										<th><strong>Ref No.</strong></th>
										<th><strong>Timestamp</strong></th>
										<th><strong>Status</strong></th>
										<th><strong>Serial No.</strong></th>
										<th><strong>Type of Device</strong></th>
										<th><strong>Brand</strong></th>
										<th><strong>Model</strong></th>
										<!--<th><strong>Purchase Date</strong></th>
						<th><strong>Warrenty End Date</strong></th>
						<th><strong>Seller-Company</strong></th>
						<th><strong>Branch</strong></th>-->
										<th><strong>Review</strong></th>
										<th><strong>Update/Delete</strong></th>
									</tr>
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
			order: [1, 'desc']
		});
	</script>
</body>

</html>