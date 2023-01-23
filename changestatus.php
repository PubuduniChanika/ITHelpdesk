<?php
include 'connection.php';
require_once 'headerITM.php';
?>
<html>

<head>
	<title>
	</title>
</head>

<body>
	<?php
	$assignee = $_SESSION['name'];
	?>
	<h4>Trouble: Update Status</h4>
	<div class="form">
		<?php
		if (empty($_GET)) {
			$row = array("", "", "", "", "", "", "", "", "", "", "","");
		} else {

			$rno = $_GET['rno'];
			$query = "select * from trouble where rno='$rno'";
			//$link="";
			//$dbresult=dbconnect($link,$query);
			$result = mysqli_query($linkID, $query);
			$row = mysqli_fetch_row($result);
		}
		?>


		<!--<h1 style="font-family:verdana;margin-left: 40px;"><b>LGN Request Form</b></h1>-->
		<form name="form" method="post" action="changestatussave.php">
			<input type="hidden" name="new" value="1" />
			<div class="container">
				<!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
				<div class="row">
					<div class="col-sm">
						Reference No.
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="rno" value="<?php echo $row[0]; ?>" required />
					</div>
					<div class="col-sm">
						Name
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="name" value="<?php echo $row[1]; ?>" required />
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-sm">
						Designation
					</div>
					<div class="col-sm">

						<select class="form-control" name="designation">
							<option disabled="disabled" selected="selected">Choose option</option>
							<option value="Additional Secretary" <?php
																	if ($row[2] == 'Additional Secretary') {
																		echo 'selected';
																	}
																	?>>Additional Secretary</option>
							<option value="Senior Assistant Secretary" <?php
																		if ($row[2] == 'Senior Assistant Secretary') {
																			echo 'selected';
																		}
																		?>>Senior Assistant Secretary</option>
							<option value="Directer" <?php
														if ($row[2] == 'Directer') {
															echo 'selected';
														}
														?>>Directer</option>
							<option value="Assistant Secretary" <?php
																if ($row[2] == 'Assistant Secretary') {
																	echo 'selected';
																}
																?>>Assistant Secretary</option>
							<option value="Legal Officer" <?php
															if ($row[2] == 'Legal Officer') {
																echo 'selected';
															}
															?>>Legal Officer</option>
							<option value="Administrative Officer" <?php
																	if ($row[2] == 'Administrative Officer') {
																		echo 'selected';
																	}
																	?>>Administrative Officer</option>
							<option value="Development Officer" <?php
																if ($row[2] == 'Development Officer') {
																	echo 'selected';
																}
																?>>Development Officer</option>
							<option value="Management Service Officer" <?php
																		if ($row[2] == 'Management Service Officer') {
																			echo 'selected';
																		}
																		?>>Management Service Officer</option>
							<option value="Office Assistant" <?php
																if ($row[2] == 'Office Assistant') {
																	echo 'selected';
																}
																?>>Office Assistant</option>
							<option value="Trainee" <?php
													if ($row[2] == 'Trainee') {
														echo 'selected';
													}
													?>>Trainee</option>
						</select>
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
										if ($row[3] == $option['branch']) {
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
						Device Serial No
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="sn" value="<?php echo $row[4]; ?>" />
					</div>
					<div class="col-sm">
						Category
					</div>
					<?php
					$query = "SELECT type FROM devicetype";
					$result = $linkID->query($query);
					if ($result->num_rows > 0) {
						$options = mysqli_fetch_all($result, MYSQLI_ASSOC);
					}
					?>
					<div class="col-sm">
						<select class="form-control" name="dcat" required>
							<option disabled="disabled" selected="selected">Choose option</option>
							<?php
							//$x=$row[9];
							foreach ($options as $option) {
							?>
								<option <?php
										if ($row[5] == $option['type']) {
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
						Trouble
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="trouble" value="<?php echo $row[6]; ?>" />
					</div>
					<div class="col-sm">
						Phone no.
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="pn" value="<?php echo $row[7]; ?>" />
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-sm">
						Date
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="date" value="<?php if (isset($row[8])) {
																						echo $row[8];
																					} ?>" />
					</div>
					<div class="col-sm">
						Assignee
					</div>
					<div class="col-sm">
						<?php
						$query = "SELECT name FROM user";
						$result = $linkID->query($query);
						if ($result->num_rows > 0) {
							$options = mysqli_fetch_all($result, MYSQLI_ASSOC);
						}
						?>

						<select class="form-control" name="assignee">
							<option>Choose option</option>
							<?php
							//$x=$row[9];
							foreach ($options as $option) {
							?>
								<option value=<?php echo $option['name']; ?> <?php if ($row[9] == $option['name']) {
																					echo 'selected';
																				} ?>>
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
						<select class="form-control" name="status" required>
							<option disabled="disabled" selected="selected">Choose option</option>
							<option value="Assigned" <?php
														if ($row[10] == 'Assigned') {
															echo 'selected';
														}
														?>>Assigned</option>
							<option value="Done!!!" <?php
													if ($row[10] == 'Done!!!') {
														echo 'selected';
													}
													?>>Done!!!</option>
							<option value="Assign to Service Company" <?php
																		if ($row[10] == 'Assign to Service Company') {
																			echo 'selected';
																		}
																		?>>Assign to Service Company</option>
							<option value="Cannot Repair" <?php
															if ($row[10] == 'Cannot Repair') {
																echo 'selected';
															}
															?>>Cannot Repair</option>
						</select>
					</div>
					<div class="col-sm">
						Review
					</div>
					<div class="col-sm">
					<input class="form-control" type="text" name="review" value="<?php echo $row[11]; ?>" />
					</div>
				</div>
				</br>
				<div class="col-sm">
					<input name="update" type="submit" value="Update" class="btn btn-success btn-sm" />
					<!--<input name="delete" type="submit" value="Delete" class="btn btn-danger btn-sm" />-->
				</div>

			</div>
			<div>
				<br>
				<br>
		</form>

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