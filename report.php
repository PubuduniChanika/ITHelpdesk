<!DOCTYPE html>
<?php
require_once 'connection.php';
//include 'header.php';
$query2 = "select * from trouble order by rno desc limit 1";
$result2 = mysqli_query($linkID, $query2);
$row = mysqli_fetch_array($result2);
$last_id = $row['rno'];
if ($last_id == "") {
    //$rno = "REF1";
    $rno = 1;
} else {
    //$rno = substr($last_id, 3);
    //$rno = (int)$rno;
    //$rno = "REF" . ($rno + 1);
    $rno = $last_id;
    $rno = $rno + 1;
}
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

    <script type="text/javascript">
        function Other(val) {
            var element = document.getElementById('otherdes');
            if (val == 'Other')
                element.style.display = 'block';
            else
                element.style.display = 'none';
        }
    </script>
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
                    <h2 class="title">Device Trouble Report Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="save.php">

                        <div class="form-row">
                            <div class="name">Reference No.</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" value='<?php echo $rno; ?>' name="rno" readonly style="background-color: black;color:red;font-size:20px">
                                    <p style="color:red"><b>Remember the Reference No to check status</b></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Name*</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Designation</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="designation">
                                            <option selected="selected" value="N/A">Choose option</option>
                                            <option value="Additional Secretary">Additional Secretary</option>
                                            <option value="Senior Assistant Secretary">Senior Assistant Secretary</option>
                                            <option value="Directer">Directer</option>
                                            <option value="Assistant Secretary">Assistant Secretary</option>
                                            <option value="Legal Officer">Legal Officer</option>
                                            <option value="Administrative Officer">Administrative Officer</option>
                                            <option value="Development Officer">Development Officer</option>
                                            <option value="Management Service Officer">Management Service Officer</option>
                                            <option value="Office Assistant">Office Assistant</option>
                                            <option value="Trainee">Trainee</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
						<?php
						$query = "SELECT branch FROM branch";
						$result = $linkID->query($query);
						if ($result->num_rows > 0) {
							$options = mysqli_fetch_all($result, MYSQLI_ASSOC);
						}
						?>
                            <div class="name">Branch*</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="branch" required>
                                            <option value= "" selected="selected" readonly>Choose option</option>
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
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Device Serial No</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="sn">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
						<?php
						$query = "SELECT type FROM devicetype";
						$result = $linkID->query($query);
						if ($result->num_rows > 0) {
							$options = mysqli_fetch_all($result, MYSQLI_ASSOC);
						}
						?>
                            <div class="name">Device Category*</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="dcat" required>
                                            <option selected="selected" value="" readonly>Choose option</option>
                                            <?php
							//$x=$row[9];
							foreach ($options as $option) {
							?>
								<option value=<?php echo $option['type'];?>> 
									<?php echo $option['type'];	?>
								</option>
							<?php
							}?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="name">Phone No<br>
                                <p style="color:red">Format:</br>070-000-0000</p>
                            </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="pn" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Trouble*</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="trouble" required onchange='Other(this.value)' required>
                                            <option value="" selected="selected" readonly>Choose option</option>
                                            <option>Does not turn on</option>
                                            <option>Cannot get printouts</option>
                                            <option>Network issue</option>
											<option>Power issue</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                        <input class="input--style-5" type="text" name="otherdes" id="otherdes" style='display:none;' placeholder="Describe here" name="othertxt" style="background-color: black;color:red;font-size:20px">
                                        <!--<input type="text" name="color" id="color" style='display:none;'/>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code">
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       <div class="form-row p-t-20">
                            <label class="label label--block">Are you an existing customer?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div>-->
                        <button class="btn btn--radius-2 btn--red" type="submit">Report</button>
                </div>
                </form>
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