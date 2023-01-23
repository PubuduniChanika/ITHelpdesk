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

  <h4>Device List</h4>
  <div class="form">
    <?php
    if (empty($_GET)) {
      $row = array("", "", "", "", "", "", "", "", "");
    } else {

      $sn = $_GET['sn'];
      $query = "select * from device where sn='$sn'";
      //$link="";
      //$dbresult=dbconnect($link,$query);
      $result = mysqli_query($linkID, $query);
      $row = mysqli_fetch_row($result);
      
             
              
    }
    ?>
    <div class="container">
      <!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
      <div class="row">
        <h5> Search by:</h5>
      </div>
      </br>
      <!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
      <div class="row">
        <div class="col-sm" style="text-align: right;padding:0.5%">
          Device
        </div>
		<?php
						$query = "SELECT type FROM deviceType";
						$result = $linkID->query($query);
						if ($result->num_rows > 0) {
							$options = mysqli_fetch_all($result, MYSQLI_ASSOC);
						}
						?>
        <div class="col-sm">
          <select class="form-select" onchange="f()" id="device">
            <option value=''>All Types</option>
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
        <div class="col-sm" style="text-align: right;padding:0.5%">
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
          <select class="form-select" onchange="f()" id="branch" >
            <option value=''>All Types</option>
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
    </div>
      </br>
      <?php
              $sql1 = "SELECT * FROM device";
              $result1 = mysqli_query($linkID, $sql1);
              $num_rows_1 = mysqli_num_rows($result1);   
              ?>
 
<h3 id="output"><?php echo "Count = ".$num_rows_1?></h3>
      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="card">
 
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th><strong>Ref. No</strong></th>
                      <th><strong>Serial No.</strong></th>
                      <th><strong>Type of Device</strong></th>
                      <th><strong>Brand</strong></th>
                      <th><strong>Model</strong></th>
                      <!--<th><strong>Purchase Date</strong></th>
                      <th><strong>Warrenty End Date</strong></th>
                      <th><strong>Seller-Company</strong></th>-->
                      <th><strong>Branch</strong></th>
                      <!--<th><strong>Update/Delete</strong></th>-->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 0;
                    //include 'connection.php';
                    $sel_query = "SELECT * FROM `device`";
                    $result = mysqli_query($linkID, $sel_query);
                    //return $result;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                      <td align="center"><?php echo $row["rno"]; ?></td>
                      <td align="center"><?php echo $row["sn"]; ?></td>
                      <td align="center"><?php echo $row["type"]; ?></td>
                      <td align="center"><?php echo $row["brand"]; ?></td>
                      <td align="center"><?php echo $row["model"]; ?></td>
                      <!--<td align="center"><?php echo $row["pdate"]; ?></td>
                      <td align="center"><?php echo $row["edate"]; ?></td>
                      <td align="center"><?php echo $row["seller"]; ?></td>-->
                      <td align="center"><?php echo $row["branch"]; ?></td>
                      <!--<td align="center">
						<a href="updatedevice.php?sn=<?php echo $row['sn']; ?>">Update/Delete</a>
						</td>-->

                      </tr>
                    <?php } ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th><strong>Ref. No</strong></th>
                      <th><strong>Serial No.</strong></th>
                      <th><strong>Type of Device</strong></th>
                      <th><strong>Brand</strong></th>
                      <th><strong>Model</strong></th>
                      <!--<th><strong>Purchase Date</strong></th>
                      <th><strong>Warrenty End Date</strong></th>
                      <th><strong>Seller-Company</strong></th>-->
                      <th><strong>Branch</strong></th>
                      <!--<th><strong>Update/Delete</strong></th>-->
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
    <script>
      
function f() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue,count;
  input1 = document.getElementById("device");
  input2 = document.getElementById("branch");

  filter1 = input1.value.toUpperCase();
  filter2 = input2.value.toUpperCase();
  table = document.getElementById("example");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  count=0;
  for (i = 0; i < tr.length; i++) {
    td1 = tr[i].getElementsByTagName("td")[2];
    td2 = tr[i].getElementsByTagName("td")[5];
    if (td1 || td2) {
      txtValue1 = td1.textContent || td1.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      if (txtValue1.toUpperCase().indexOf(filter1) > -1 && txtValue2.toUpperCase().indexOf(filter2) > -1) {
        tr[i].style.display = "";
        count++;
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  document.getElementById("output").innerHTML="Count = "+count;
}



  


    </script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <!--<script src="./js/script.js"></script>-->
    <script>
	$('#example').dataTable({
    "bProcessing": true,
    "sAutoWidth": false,
    "bDestroy":true,
    "sPaginationType": "bootstrap", // full_numbers
    "iDisplayStart ": 10,
    "iDisplayLength": 10,
    "bPaginate": false, //hide pagination
    "bFilter": true, //hide Search bar
    "bInfo": false, // hide showing entries
	"ordering": true
})
</script>
    
   
   
</body>

</html>