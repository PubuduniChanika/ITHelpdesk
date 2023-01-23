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


  <?php

  $query = "
    SELECT 
      branch as branch,COUNT(rno) as amount
    FROM trouble 
    GROUP BY branch
  ";
  /*$queryDone = "
    SELECT 
      branch as branch,
        COUNT(rno) as amount
    FROM trouble WHERE status='Done!!!'
    GROUP BY branch
  ";
  $queryASC = "
    SELECT 
      branch as branch,
        COUNT(rno) as amount
    FROM trouble WHERE type='Assign to Service Company'
    GROUP BY branch
  ";
   $queryCR = "
    SELECT 
      branch as branch,
        COUNT(rno) as amount
    FROM trouble WHERE status='Cannot repair'
    GROUP BY branch
  ";*/
  
  $result = mysqli_query($linkID, $query);
  /*$resultDone = mysqli_query($linkID, $queryDone);
  $resultASC = mysqli_query($linkID, $queryASC);
  $resultCR = mysqli_query($linkID, $queryCR);*/

   foreach ($result as $data) {
    $branch[] = $data['branch'];
    $amount[] = $data['amount'];
  }
  /*foreach ($resultDone as $data) {
    
    $amountDone[] = $data['amount'];
  }
  foreach ($resultASC as $data) {
    $amountASC[] = $data['amount'];
  }
  foreach ($resultCR as $data) {
    $amountCR[] = $data['amount'];
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
            label: 'Reported Troubles',
            data: <?php echo json_encode($amount) ?>,
            backgroundColor: [
              'rgba(204,0,255)'

            ],

          }]};
          /*{
            label: 'Done!!!',
            data: <?php echo json_encode($amountDone) ?>,
            backgroundColor: [
              'rgba(186,85,211)'
            ],

          },
          {
            label: 'ASC',
            data: <?php echo json_encode($amountASC) ?>,
            backgroundColor: [
              'rgba(0, 153, 51)'
            ],

          },
          {
            label: 'CR',
            data: <?php echo json_encode($amountCR) ?>,
            backgroundColor: [
              'rgba(144,238,144)'
            ]

          }
        ]

      };*/

      const config = {
        type: 'bar',
        data: data,
        options: {

          scales: {
            x: {
              ticks: {
                font: {
                  size: 17,
                  color: "#000000"
                }
              }
            },
            y: {
              ticks: {
                font: {
                  size: 17,
                  color: "#000000"
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