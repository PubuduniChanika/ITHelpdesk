<?php
include 'headerIncharge.php';
require_once 'connection.php';
?>
<html>
<head>
<title>
</title>
</head>

<body>

<h4>Add User</h4>
<div class="form">
<?php
if(empty($_GET)){
    $row=array("","","","","","","","");
}
else{
//include('connection.php');
$name=$_GET['name'];
$query="select * from user where name='$name'";
//$link="";
//$dbresult=dbconnect($link,$query);
$result=mysqli_query($linkID,$query);
$row=mysqli_fetch_row($result);
}
?>

<!--<h1 style="font-family:verdana;margin-left: 40px;"><b>LGN Request Form</b></h1>-->
<form name="form" method="post" action="usersave.php"> 
<input type="hidden" name="new" value="1" />
<div class="container">
<!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
<div class="row">
    <div class="col-sm">
	Name with Initial
	</div>
	<div class="col-sm">
	<input class="form-control" type="text" name="name" required />
	</div>
	<div class="col-sm">
	Designation
	</div>
	<div class="col-sm">
	<select class="form-control" id="designation" name="designation" required>

	<option disabled="disabled" selected="selected">Choose option</option>
  	<option>IT-Director</option>
  	<option>IT-Officer</option>
  	<option>IT-Assistant</option>
  	<option>Development Officer</option>
  	<option>Office Assistant</option>
	<option>Other</option>
	</select>
	</div>
</div>
</br>
<div class="row">
    <div class="col-sm">
	Username
	</div>
	<div class="col-sm">
	<input class="form-control" type="text" name="uname"  required />
	</div>
	<div class="col-sm">
	Password
	</div>
	<div class="col-sm">
	<input class="form-control" type="text" name="password" required />
	</div>
</div>

</br>
<div class="row">
	<div class="col-sm">
	Userlevel
	</div>
	<div class="col-sm">
	<select class="form-control" id="ulevel" name="ulevel" required>

	<option disabled="disabled" selected="selected" value="">Choose option</option>
  	<option>IT-Director</option>
  	<option>IT-Incharge</option>
  	<option>IT-Member</option>
  	<option>Supply</option>
  	<option>Accounts</option>
  
	</select>
	</div>
	<div class="col-sm">

	</div>
	<div class="col-sm">
	
	</div>
</div>
	<br>
	<div class="col-sm">
	<input name="submit" type="submit" value="Add User" class="btn btn-success btn-sm" />
	</div>
	
</div>

</div>
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
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
					  <th><strong>Timestamp</strong></th>
						<th><strong>Name</strong></th>
						<th><strong>Designation</strong></th>
						<th><strong>Username</strong></th>
						<th><strong>Password</strong></th>
						<th><strong>User Level</strong></th>
						<th><strong>Update/Delete</strong></th>
					</tr>
                    </thead>
                    <tbody>
					<?php
					$count=1;
					include 'connection.php';
					$sel_query = "SELECT * FROM `user`";
					$result=mysqli_query($linkID,$sel_query);
					//return $result;
                      while($row = mysqli_fetch_assoc($result)) { ?>
						<td align="center"><?php echo $row["Timestamp"]; ?></td>
						<td align="center"><?php echo $row["name"]; ?></td>
						<td align="center"><?php echo $row["designation"]; ?></td>
						<td align="center"><?php echo $row["uname"]; ?></td>
						<td align="center"><?php echo $row["pwd"]; ?></td>
						<td align="center"><?php echo $row["ulevel"]; ?></td>
						<td align="center">
						<a href="updateuser.php?name=<?php echo $row['name']; ?>">Update/Delete</a>
						</td>
						
						</tr>
					  <?php }?>

                    </tbody>
                    <tfoot>
                      <tr>
					  <th><strong>Timestamp</strong></th>
						<th><strong>Name</strong></th>
						<th><strong>Designation</strong></th>
						<th><strong>Username</strong></th>
						<th><strong>Password</strong></th>
						<th><strong>User Level</strong></th>
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
	
    $('#example').DataTable( {
        order: [ 0, 'desc' ]
    } );
</script>
  </body>
</html>
