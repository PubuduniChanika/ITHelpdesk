<?php
require_once 'connection.php';
include 'headerAccount.php';
?>
<html>

<head>
	<title>
	</title>
	<style>
	table td:nth-child(12):empty{
    background-color: #f8d7da;
}
</style>
</head>

<body>
	<h4>View Troubles</h4>
	<div class="form">
	<?php
          $sql1 = "SELECT * FROM `trouble` WHERE `status`='Assign to Service Company'";
          $result1 = mysqli_query($linkID, $sql1);
          $num_rows1 = mysqli_num_rows($result1);
		  $sql2 = "SELECT * FROM `assignedsc` WHERE `service_company`!=''";
          $result2 = mysqli_query($linkID, $sql2);
          $num_rows2 = mysqli_num_rows($result2);
		  $count=$num_rows1-$num_rows2;
          ?>
          <h4 class="text-danger" align="right"><span class="text-secondary">Pending</span> <?php echo $count?></h4>
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
										<th><strong>Reference No.</strong></th>
										<th><strong>Name</strong></th>
										<th><strong>Designation</strong></th>
										<th><strong>Branch</strong></th>
										<th><strong>Device Serial No.</strong></th>
										<th><strong>Category</strong></th>
										<th><strong>Trouble</strong></th>
										<th><strong>Phone No</strong></th>
										<th><strong>Date</strong></th>
										<th><strong>Assignee</strong></th>
										<th><strong>IT review</strong></th>
										<th><strong>Service Company</strong></th>
										<th><strong>Amount(Rs.)</strong></th>
										<th><strong>Service Company Review</strong></th>
										<th><strong>Assign to Service Company</strong></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count = 1;
									//$linkID=mysqli_connect('localhost', 'root', '', 'TS');
									$sel_query = "SELECT trouble.rno,`name`,`branch`,`designation`,`sn`,`dcat`,`trouble`,`pn`,`date`,`assignee`,`status`,trouble.review as ITreview,`service_company`,`acc_no`,`amount`,assignedsc.review FROM `trouble` LEFT JOIN`assignedsc` ON trouble.rno=assignedsc.rno where `status`='Assign to Service Company'";
									//$sel_query ="SELECT * FROM `trouble` where `status`='Assign to Service Company'";
									$result = mysqli_query($linkID, $sel_query);
									//return $result;
									while ($row = mysqli_fetch_assoc($result)) { ?>

										<td align="center"><?php echo $row["rno"]; ?></td>
										<td align="center"><?php echo $row["name"]; ?></td>
										<td align="center"><?php echo $row["designation"]; ?></td>
										<td align="center"><?php echo $row["branch"]; ?></td>
										<td align="center"><?php echo $row["sn"]; ?></td>
										<td align="center"><?php echo $row["dcat"]; ?></td>
										<td align="center"><?php echo $row["trouble"]; ?></td>
										<td align="center"><?php echo $row["pn"]; ?></td>
										<td align="center"><?php echo $row["date"]; ?></td>
										<td align="center"><?php echo $row["assignee"]; ?></td>
										<td align="center"><?php echo $row["ITreview"]; ?></td>
										<td align="center"><?php echo $row["service_company"]; ?></td>

										<td align="center"><?php echo $row["amount"]; ?></td>
										<td align="center"><?php echo $row["review"]; ?></td>

										<td align="center">

											<a href="payment.php?rno=<?php echo $row['rno']; ?>">Assign to Service Company</a>
										</td>

										</tr>
									<?php } ?>

								</tbody>
								<tfoot>
									<tr>
										<th><strong>Reference No.</strong></th>
										<th><strong>Name</strong></th>
										<th><strong>Designation</strong></th>
										<th><strong>Branch</strong></th>
										<th><strong>Device Serial No.</strong></th>
										<th><strong>Category</strong></th>
										<th><strong>Trouble</strong></th>
										<th><strong>Phone No</strong></th>
										<th><strong>Date</strong></th>
										<th><strong>Assignee</strong></th>
										<th><strong>IT review</strong></th>
										<th><strong>Service Company</strong></th>
										<th><strong>Amount</strong></th>
										<th><strong>Service Company Review</strong></th>
										<th><strong>Assign to Service Company</strong></th>
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
			order: [0, 'desc']
		});
	</script>
</body>

</html>