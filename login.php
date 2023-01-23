<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Login</title>

    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 16px;
    letter-spacing: 5px;
    background-color:#000000;
    color:#ffffff;
  }
  .navbar-default .navbar-nav>li>a {
    color: #FFFFFF;
}

.navbar-nav  li a:hover {
    color: #1abc9c !important;
  }
.icon-background {
    color: black;
}
.icon{
    color:#FFFFFF;
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
<!--<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>-->
      <!--<a class="navbar-brand" href="#">Me</a>-->
    <!--</div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href=""><i class="fa fa-home fa-5x"></i></a></li>
        
        
      </ul>
    </div>
  </div>
</nav>-->

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <span style="float:right;" class="fa-stack fa-4x">
    <a href='index.php'>
    <i class="fa fa-circle fa-stack-2x icon-background"></i>
    <i class="fa fa-home fa-stack-1x icon"></i>

    </span>
    </a>
        <div class="wrapper wrapper--w790 center">

            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Login</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="validate.php?op=in">
						
						<div class="form-row">
                            <div class="name">Username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="user" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="pwd" required>
                                </div>
                            </div>
                        </div>
                        
                            <button class="btn btn--radius-2 btn--red" type="submit">Login</button>
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
