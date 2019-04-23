<!DOCTYPE html>
<html>

<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CvSU IT Department File Management System</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="../css/font.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

<style>

.panel-body {
    padding: 15px;
    background-color: #379441;
}
.navbar-default {
border-color: #27A6BE;
}
.panel-default > .panel-heading {
    color: #fff;
    background-color: #134c19;
    border-color: #fff;
    text-align: center;
}

.body-Login-back {

    background-image:  url("../images/login_background.png");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: right bottom;
    background-color: #5cb85c;
}
.logo-margin {
    margin-top: 100px;
}
.login-panel {
    margin-top: 15%;
}
.btn-success{
    background-color: #5cb85c !important;
}
.btn-success:hover{
    background-color: #2b982b !important;
}
</style>
</head>
<body class="body-Login-back">
    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="../images/logo.png" alt=""/>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control input-lg" placeholder="Username" style="text-align:center;" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" placeholder="Password" style="text-align:center;" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" name="btn_submit" value="Login">
                                <!-- <a href="main.php" class="btn btn-lg btn-success btn-block">Login</a> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        include "connection.php";

        if(isset($_POST['btn_submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $a = mysqli_query($con,"SELECT * from tbladmin where username = '".$username."' and password = '".$password."' ");
            $ad = mysqli_num_rows($a);

            $f = mysqli_query($con,"SELECT * from tblfaculty where username = '".$username."' and password = '".$password."' ");
            $fa = mysqli_num_rows($f);

            if($ad > 0){
                while($row = mysqli_fetch_array($a)){
                  $_SESSION['role'] = "Administrator";
                  $_SESSION['userid'] = $row['id'];
                  $_SESSION['username'] = $row['username'];
                }    
                header ('location: dashboard/dashboard.php');
            }
            else if($fa > 0){
                while($row = mysqli_fetch_array($f)){
                  $_SESSION['role'] = "Faculty";
                  $_SESSION['userid'] = $row['id'];
                  $_SESSION['username'] = $row['username'];
                }    
                header ('location: dashboard/dashboard.php');
            }
        }

    ?>
    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/examples/sign-in.js"></script>
</body>

</html>