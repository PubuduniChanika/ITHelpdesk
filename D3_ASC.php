<!DOCTYPE html>
<?php include 'headerIncharge.php' ?>
<?php require_once 'connection.php' ?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Frontendfunn - Bootstrap 5 Admin Dashboard Template</title>
  </head>
  <body>

        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Data Table
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
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
							            <th><strong>Status</strong></th>
						    <!--<th><strong>Assign/Change Status/Update/Delete</strong></th>-->
					            </tr>
          </thead>
          <tbody>
					<?php 
					//$count=1;
					//$linkID=mysqli_connect('localhost', 'root', '', 'TS');
					$sel_query = "SELECT * FROM `trouble` WHERE status='Assign to Service Company'";
					$result=mysqli_query($linkID,$sel_query);
					//return $result;
                      while($row = mysqli_fetch_assoc($result)) { ?>
						
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
						<td align="center"><?php echo $row["status"]; ?></td>
					
						<!--<td align="center">
						<a href="updatetrouble.php?rno=<?php //echo $row['rno']; ?>">Assign/Change Status/Update/Delete</a>
						</td>-->
						
						</tr>
					  <?php }?>

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
						          <th><strong>Status</strong></th>
						          <!--<th><strong>Assign/Change Status/Update/Delete</strong></th>-->
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
  </body>
</html>
