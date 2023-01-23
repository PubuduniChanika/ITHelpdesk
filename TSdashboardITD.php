<!DOCTYPE html>
<?php
include 'headerITD.php';
require_once 'connection.php';
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Frontendfunn - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body>
  <!-- top navigation bar -->
  <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          >Frontendfunn</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            <div class="input-group">
              <input
                class="form-control"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>-->
  <!-- top navigation bar -->
  <!-- offcanvas -->
  <!--<div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">
                CORE
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
			<li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Add User</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Interface
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#layouts"
              >
                <span class="me-2"><i class="bi bi-layout-split"></i></span>
                <span>Layouts</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Dashboard</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Pages</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Addons
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Charts</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Tables</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>-->

  <!-- offcanvas -->

  <!--<main class="mt-5 pt-3">-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h4>Dashboard</h4>
      </div>
    </div>
    <div class="row">

      <div class="col-md-3 mb-3">
        <div class="card bg-warning text-dark h-100">
          <!--<div class="card-body py-5">Warning Card</div>-->
          <div class="card-body py-5">
            <h3 class="card-title">Assigned</h3>
          </div>

          <?php
          $sql1 = "SELECT * FROM trouble WHERE status='Assigned'";
          $result = mysqli_query($linkID, $sql1);
          $num_rows_1 = mysqli_num_rows($result);
          ?>
          <div class="card-body py-5" style="font-size: 50px;text-align:center;"><?php echo $num_rows_1 ?></div>
          <div class="card-footer d-flex">
            <a href='D1_ASSIGNED_ITD.php' style="color: black">View Details</a>
            <span class="ms-auto">
              <i class="bi bi-chevron-right"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-success text-white h-100">
          <!--<div class="card-body py-5">Success Card</div>-->

          <div class="card-body py-5">
            <h3 class="card-title">Done!!!</h3>
          </div>
          <?php
          $sql2 = "SELECT * FROM trouble WHERE status='Done!!!'";
          $result = mysqli_query($linkID, $sql2);
          $num_rows_2 = mysqli_num_rows($result);
          ?>
          <div class="card-body py-5" style="font-size: 50px;text-align:center;"><?php echo $num_rows_2 ?></div>
          <div class="card-footer d-flex">
            <a href='D2_DONE_ITD.php' style="color: white">View Details</a>
            <span class="ms-auto">
              <i class="bi bi-chevron-right"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white h-100">
          <!--<div class="card-body py-5">Primary Card</div>-->
          <div class="card-body py-5">
            <h3 class="card-title">Assign to Service Company</h3>
          </div>
          <?php
          $sql3 = "SELECT * FROM trouble WHERE status='Assign to Service Company'";
          $result = mysqli_query($linkID, $sql3);
          $num_rows_3 = mysqli_num_rows($result);
          ?>
          <div class="card-body py-5" style="font-size: 50px;text-align:center;"><?php echo $num_rows_3 ?></div>
          <div class="card-footer d-flex">
            <a href='D3_ASC_ITD.php' style="color: white">View Details</a>
            <span class="ms-auto">
              <i class="bi bi-chevron-right"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-danger text-white h-100">
          <!--<div class="card-body py-5">Danger Card</div>-->
          <div class="card-body py-5">
            <h3 class="card-title">Cannot Repair</h3>
          </div>
          <?php
          $sql4 = "SELECT * FROM trouble WHERE status='Cannot Repair'";
          $result = mysqli_query($linkID, $sql4);
          $num_rows_4 = mysqli_num_rows($result);
          ?>
          <div class="card-body py-5" style="font-size: 50px;text-align:center;"><?php echo $num_rows_4 ?></div>
          <div class="card-footer d-flex">
            <a href='D4_CR_ITD.php' style="color: white">View Details</a>
            <span class="ms-auto">
              <i class="bi bi-chevron-right"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
    <!--<div class="row">
          <div class="col-md-6 mb-3">
            <div class="card h-100">
              <div class="card-header">
                <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                Area Chart Example
              </div>
              <div class="card-body">
                <canvas class="chart" width="400" height="200"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card h-100">
              <div class="card-header">
                <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                Area Chart Example
              </div>
              <div class="card-body">
                <canvas class="chart" width="400" height="200"></canvas>
              </div>
            </div>
          </div>
        </div>-->
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
                    <th><strong>Status</strong></th>
                    <th><strong>Review</strong></th>
                    <!--<th><strong>Assign/Change Status/Update/Delete</strong></th>-->
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $sel_query = "SELECT * FROM `trouble`";
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
                    <td align="center"><?php echo $row["status"]; ?></td>
                    <td align="center"><?php echo $row["review"]; ?></td>
                    <!--<td align="center">
						<a href="updatetrouble.php?rno=<?php //echo $row['rno']; 
                                            ?>">Assign/Change Status/Update/Delete</a>
						</td>-->

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
                    <th><strong>Status</strong></th>
                    <th><strong>Review</strong></th>
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