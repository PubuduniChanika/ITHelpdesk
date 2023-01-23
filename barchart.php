<!DOCTYPE html>
<?php
include 'headerITD.php';
require_once 'connection.php';
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Document</title>
</head>
<style>
  #card1 {
    background-color: rgba(255, 99, 132);
  }

  #card2 {
    background-color: rgba(186, 85, 211);
  }

  #card3 {
    background-color: rgba(135, 206, 250);
  }

  #card4 {
    background-color: rgba(144, 238, 144);
  }
</style>

<body>
  <!--<div class="row">

    <div class="col-md-1 mb-3">
      <div class="card text-dark h-80 text-center" id="card1">
        <!--<div class="card-body py-5">Warning Card</div>
        <?php
        $sql1 = "SELECT * FROM device WHERE type='Laptop'";
        $result = mysqli_query($linkID, $sql1);
        $num_rows_1 = mysqli_num_rows($result);
        ?>
        <div class="card-body py-5" style="font-size: 80px;text-align:center;">
        <h3>LAPTOP</h3><?php echo $num_rows_1 ?>
        </div>
      </div>
    </div>
    <div class="col-md-1 mb-3">
      <div class="card text-dark h-80 text-center" id="card2">
        
        <?php
        $sql1 = "SELECT * FROM device WHERE type='Desktop'";
        $result = mysqli_query($linkID, $sql1);
        $num_rows_1 = mysqli_num_rows($result);
        ?>
        <div class="card-body py-5" style="font-size: 80px;text-align:center;">
        <h3>DESKTOP</h3><?php echo $num_rows_1 ?>
        </div>
      </div>
    </div>
    <div class="col-md-1 mb-3">
      <div class="card text-dark h-80 text-center" id="card3">
       
        <?php
        $sql1 = "SELECT * FROM device WHERE type='Printer'";
        $result = mysqli_query($linkID, $sql1);
        $num_rows_1 = mysqli_num_rows($result);
        ?>
        <div class="card-body py-5" style="font-size: 80px;text-align:center;">
        <h3>PRINTER</h3><?php echo $num_rows_1 ?>
        </div>
      </div>
    </div>
    <div class="col-md-1 mb-3">
      <div class="card text-dark h-80 text-center" id="card4">
        
        <?php
        $sql1 = "SELECT * FROM device WHERE type='Other'";
        $result = mysqli_query($linkID, $sql1);
        $num_rows_1 = mysqli_num_rows($result);
        ?>
        <div class="card-body py-5" style="font-size: 80px;text-align:center;">
        <h3>OTHER</h3><?php echo $num_rows_1 ?>
        </div>
      </div>
    </div>-->
    </div>
  </div>

  <?php

  $queryCPU = "
    SELECT 
      branch as branch,
        COUNT(sn) as amount
    FROM device WHERE type='CPU'
    GROUP BY branch
  ";
  $queryLaptop = "
    SELECT 
      branch as branch,
        COUNT(sn) as amount
    FROM device WHERE type='Laptop'
    GROUP BY branch
  ";
  $queryPrinter = "
    SELECT 
      branch as branch,
        COUNT(sn) as amount
    FROM device WHERE type='Printer'
    GROUP BY branch
  ";
   $queryFax = "
    SELECT 
      branch as branch,
        COUNT(sn) as amount
    FROM device WHERE type='Fax'
    GROUP BY branch
  ";
   $queryPhotocopy = "
    SELECT 
      branch as branch,
        COUNT(sn) as amount
    FROM device WHERE type='Photocopy'
    GROUP BY branch
  ";
  $queryMonitor = "
    SELECT 
      branch as branch,
        COUNT(sn) as amount
    FROM device WHERE type='Monitor'
    GROUP BY branch
  ";
  $queryOther = "
    SELECT 
      branch as branch,
        COUNT(sn) as amount
    FROM device WHERE type='Other'
    GROUP BY branch
  ";
  $resultCPU = mysqli_query($linkID, $queryCPU);
  $resultLaptop = mysqli_query($linkID, $queryLaptop);
  $resultPrinter = mysqli_query($linkID, $queryPrinter);
  $resultFax = mysqli_query($linkID, $queryFax);
  $resultPhotocopy = mysqli_query($linkID, $queryPhotocopy);
  $resultMonitor = mysqli_query($linkID, $queryMonitor);
  $resultOther = mysqli_query($linkID, $queryOther);

   foreach ($resultCPU as $data) {
    $branch[] = $data['branch'];
    $amountCPU[] = $data['amount'];
  }
  foreach ($resultLaptop as $data) {
    
    $amountLaptop[] = $data['amount'];
  }
  foreach ($resultPrinter as $data) {
    $amountPrinter[] = $data['amount'];
  }
  foreach ($resultFax as $data) {
    $amountFax[] = $data['amount'];
  }
  foreach ($resultPhotocopy as $data) {
    $amountPhotocopy[] = $data['amount'];
  }
  foreach ($resultMonitor as $data) {
    $amountMonitor[] = $data['amount'];
  }
  /*foreach ($resultOther as $data) {
    $amountOther[] = $data['amount'];
  }*/

  ?>

  <div>
    <div>
    
      <canvas id="myChart"></canvas>

    </div>



    <script>
      // === include 'setup' then 'config' above ===

      const labels = <?php echo json_encode($branch) ?>;
      const data = {
        labels: labels,
        datasets: [{
            label: 'CPU',
            data: <?php echo json_encode($amountCPU) ?>,
            backgroundColor: [
              'rgba(255, 50, 132)'

            ],

          },
          {
            label: 'Laptop',
            data: <?php echo json_encode($amountLaptop) ?>,
            backgroundColor: [
              'rgba(255, 50, 180)'

            ],

          },
          {
            label: 'Printer',
            data: <?php echo json_encode($amountPrinter) ?>,
            backgroundColor: [
              'rgba(186,85,211)'
            ],

          },
          /*{
            label: 'Fax',
            data: <?php echo json_encode($amountFax) ?>,
            backgroundColor: [
              'rgba(135,206,250)'
            ],

          },*/
          {
            label: 'Photocopy',
            data: <?php echo json_encode($amountPhotocopy) ?>,
            backgroundColor: [
              'rgba(0, 102, 255)'
            ],

          },
          {
            label: 'Monitor',
            data: <?php echo json_encode($amountMonitor) ?>,
            backgroundColor: [
              'rgba(0, 153, 51)'
            ],

          },
          /*{
            label: 'Other',
            data: <?php echo json_encode($amountOther) ?>,
            backgroundColor: [
              'rgba(144,238,144)'
            ]

          }*/
        ]

      };

      const config = {
        type: 'bar',
        data: data,
        options: {

          scales: {
            x: {
              ticks: {
                font: {
                  size: 15,
                  color: "black"
                }
              }
            },
            y: {
              ticks: {
                font: {
                  size: 15,
                  color: "black"
                }
              }
            }
          }
        }

      };

      var myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
    </script>



  </div>
  </div>


</body>

</html>