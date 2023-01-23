<!DOCTYPE html>
<?php
require_once 'connection.php';
//include 'headerITD.php';
?>

<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">

  <!-- Title Page-->
  <title>Device Trouble Report Form</title>

  <!-- Icons font CSS-->
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <!-- Font special for pages-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

  <!-- Vendor CSS-->
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/main.css" rel="stylesheet" media="all">

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
    .icon-background {
      color: black;
    }

    .icon {
      color: #FFFFFF;
    }

    .center {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);

    }
  </style>

</head>

<body>
  <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <span style="float:right;" class="fa-stack fa-4x">
      <a href='index.php'>
        <i class="fa fa-circle fa-stack-2x icon-background"></i>
        <i class="fa fa-home fa-stack-1x icon"></i>
    </span>
    </a>
    <div class="wrapper wrapper--w790">
      <div class="card card-5">

        <div class="card-heading">
          <h2 class="title">Check Status</h2>
        </div>
        <div class="card-body">
          <form name="form" method="post" action="">
            <input class="form-control" type="hidden" name="new" value="1" />
            <div class="container">
              <!--<th style="font-family:verdana,text-align:centre">LGN Request Form</th>-->
              <div class="row">
                <div class="col-sm" style="text-align: right;padding:0.5%">
                  <b>Reference No</b>
                </div>
                <div class="col-sm">
                  <input class="form-control" type="text" name="rno" id="rno" placeholder="Enter reference number to get status report">
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
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">



            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $rno = $_POST['rno'];
              //include 'connection.php';
              $sel_query = "SELECT * FROM `trouble` WHERE `rno`='$rno'";
              $result = mysqli_query($linkID, $sel_query);
              if (mysqli_num_rows($result) == 0) {
                echo "<b><p style='color:red;'>Invalid item number</p></b>";
              }
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <table class="table mx-auto" style width=30px>
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">#</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                      <td>Reference No.</td>
                      <td><?php echo $row["rno"]; ?></td>

                    </tr>
                    <tr>

                      <td>Name</td>
                      <td><?php echo $row["name"]; ?></td>

                    </tr>
                    <tr>

                      <td>Designation</td>
                      <td><?php echo $row["designation"]; ?></td>

                    </tr>


                    <tr>

                      <td>Date</td>
                      <td><?php echo $row["date"]; ?></td>

                    </tr>
                    <tr>

                      <td>Branch</td>
                      <td><?php echo $row["branch"]; ?></td>

                    </tr>

                    <tr class="table-info">

                      <td>Status</td>
                      <td><?php echo $row["status"]; ?></td>

                    </tr>
                    <tr class="table-info">

                      <td>Assignee</td>
                      <td><?php echo $row["assignee"]; ?></td>

                    </tr>
                    <tr class="table-info">

                      <td>Review</td>
                      <td><?php echo $row["review"]; ?></td>

                    </tr>


                  </tbody>
                </table>


              <?php }  ?>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Jquery JS-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Vendor JS-->
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/datepicker/moment.min.js"></script>
  <script src="vendor/datepicker/daterangepicker.js"></script>

  <!-- Main JS-->
  <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->