<?php
require_once 'connection.php';
include 'headerAccount.php';
?>
<html>

<head>

	<script>

	</script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js">
	</script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript">
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
</head>

<body>
	<h4>Trouble: Assign to a Service Company</h4>
	</br>
	<div class="form">
		<?php
		if (empty($_GET)) {
			$row = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
		} else {
			$rno = $_GET['rno'];
			$query = "SELECT * FROM `trouble` LEFT JOIN`assignedsc` ON trouble.rno=assignedsc.rno where trouble.rno='$rno'";
			//$link="";
			//$dbresult=dbconnect($link,$query);
			$result = mysqli_query($linkID, $query);
			$row = mysqli_fetch_row($result);
		}
		?>

		<!--<h1 style="font-family:verdana;margin-left: 40px;"><b>LGN Request Form</b></h1>-->
		<form name="form" method="post" action="addservicecompanysave.php">
			<input class="form-control" type="hidden" name="new" value="1" />
			<div class="container">
				<!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
				<div class="row">
					<div class="col-sm">
						Reference No.
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="rno" value="<?php echo $row[0]; ?>" required readonly />
					</div>
					<div class="col-sm">
						Name
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="name" value="<?php echo $row[1]; ?>" required disabled />
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-sm">
						Designation
					</div>
					<div class="col-sm">

						<select class="form-control" name="designation" disabled>
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
						<select class="form-control" name="branch" required disabled>
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
						<input class="form-control" type="text" name="sn" value="<?php echo $row[4]; ?>" disabled />
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
						<select class="form-control" name="dcat" required disabled>
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
						<input class="form-control" type="text" name="trouble" value="<?php echo $row[6]; ?>" disabled />
					</div>
					<div class="col-sm">
						Phone no.
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="pn" value="<?php echo $row[7]; ?>" disabled />
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
																					} ?>" disabled />
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

						<select class="form-control" name="assignee" disabled>
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
						<select class="form-control" name="status" required disabled>
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
					<input class="form-control" type="text" name="pn" value="<?php echo $row[11]; ?>" disabled />
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-sm">
						Service Company
					</div>
					<div class="col-sm">
						<?php
						$query = "SELECT `service_company` FROM `service_company`";
						$result = $linkID->query($query);
						if ($result->num_rows > 0) {
							$options = mysqli_fetch_all($result, MYSQLI_ASSOC);
						}
						?>
						<select class="form-control" name="service_company" id="sc" onchange="GetDetail(this.value)" value="">
							<option value="">Choose option</option>
							<?php
							//$x=$row[9];
							foreach ($options as $option) {
							?>
								<option value=<?php echo $option['service_company']; ?> <?php if ($row[13] == $option['service_company']) {
																							echo 'selected';
																						} ?>>
									<?php echo $option['service_company'];	?>
								</option>
							<?php
							}
							?>
						</select>
						<!--<select name="sc"
	id='sc' class='form-control'
	onchange="GetDetail(this.value)" >
	<option>xx</option>
	<option>yy</option>
</select>-->
						<p style="color:32A80F" id="result" align="center">
					</div>
					<div class="col-sm">
						Bank Account No
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="accno" id="accno" value="<?php echo $row[14]; ?>" />
					</div>
				</div>
				</br>


				<div class="row">
					<div class="col-sm">
						Amount(Rs.)
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="amount" value="<?php echo $row[15]; ?>" />
					</div>
					<div class="col-sm">
						Review
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="review" value="<?php echo $row[16]; ?>" />
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-sm">
						<input name="assign" type="submit" value="   Assign   " class="btn btn-success btn-sm" />
						<!--<input name="update" type="submit" value="Update" class="btn btn-success btn-sm" />
						<input name="delete" type="submit" value="Delete" class="btn btn-danger btn-sm" />-->
					</div>
					</br>
				</div>
				</br>
				<div class="row">
					<input name="pay" type="button" value="PAY" class="btn btn-warning btn-lg" onclick="window.open('https://www.peoplesbank.lk/digital-banking/','_blank')" />
				</div>
			</div>
	</div>
	</div>
	</br>
	</div>
	<div>
		<br>
		<br>
		</form>
		</main>
		<script src="./js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
		<script src="./js/jquery-3.5.1.js"></script>
		<script src="./js/jquery.dataTables.min.js"></script>
		<script src="./js/dataTables.bootstrap5.min.js"></script>
		<script src="./js/script.js"></script>
		<script>
			// onkeyup event will occur when the user
			// release the key and calls the function
			// assigned to this event
			function GetDetail(str) {
				if (str.length == 0) {
					document.getElementById("accno").value = "";
					return;
				} else {

					// Creates a new XMLHttpRequest object
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {

						// Defines a function to be called when
						// the readyState property changes
						if (this.readyState == 4 &&
							this.status == 200) {

							// Typical action to be performed
							// when the document is ready
							var myObj = JSON.parse(this.responseText);

							// Returns the response data as a
							// string and store this array in
							// a variable assign the value
							// received to first name input field

							document.getElementById("accno").value = myObj[0];

							// Assign the value received to
							// last name input field
							//document.getElementById(
							//"last_name").value = myObj[1];
						}
					};

					// xhttp.open("GET", "filename", true);
					xmlhttp.open("GET", "accNo.php?service_company=" + str, true);

					// Sends the request to the server
					xmlhttp.send();
				}
			}
		</script>
</body>

</html>