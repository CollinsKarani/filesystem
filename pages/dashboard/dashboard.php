<?php 
session_start();
ob_start();
    include "../header.php"; 
?>
<style>
.bg-dash {
    background-image:  url("../../images/login_background_black.png");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: right 1% bottom 0%;
    width:100%;
    overflow:hidden;
    color: black;
    height: 430px;
}
</style>
<?php include "../sidebar.php"; ?>
<?php include "../connection.php"; ?>
             
            <!-- START CONTENT -->
            <section class="content">
            <?php include "../modals/account_modal.php"; ?>
                <div class="container-fluid ">
                    <div class="block-header">
                        <h2>DASHBOARD</h2>
                    </div>

                    <!-- Widgets -->
                    <div class="row clearfix">

                    <?php
                        if($_SESSION['role'] == "Administrator"){
                    ?>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-light-green hover-expand-effect">
                                <div class="icon">
                                    <i class="material-icons">person</i>
                                </div>
                                <div class="content">
                                    <div class="text">TEACHERS</div>
                                    <div class="number count-to">
                                        <?php
                                            include "../connection.php";

                                            $q = mysqli_query($con,"SELECT * from tblfaculty");
                                            $ct = mysqli_num_rows($q);

                                            echo $ct;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-light-green hover-expand-effect">
                                <div class="icon">
                                    <i class="material-icons">near_me</i>
                                </div>
                                <div class="content">
                                    <div class="text">FILES SUBMITTED</div>
                                    <div class="number count-to">
                                        <?php
                                           

                                            $q1 = mysqli_query($con,"SELECT * from tblfilessubmitted");
                                            $ct1 = mysqli_num_rows($q1);

                                            echo $ct1;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-light-green hover-expand-effect">
                                <div class="icon">
                                    <i class="material-icons">check</i>
                                </div>
                                <div class="content">
                                    <div class="text">APPROVED FILES</div>
                                    <div class="number count-to">
                                        <?php

                                            $q2 = mysqli_query($con,"SELECT * from tblfilessubmitted where status = 'Approved' ");
                                            $ct2 = mysqli_num_rows($q2);

                                            echo $ct2;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    else
                    {
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-light-green hover-expand-effect">
                                <div class="icon">
                                    <i class="material-icons">near_me</i>
                                </div>
                                <div class="content">
                                    <div class="text">FILES SUBMITTED</div>
                                    <div class="number count-to">
                                        <?php
                                           

                                            $q1 = mysqli_query($con,"SELECT * from tblfilessubmitted where facultyid = '".$_SESSION['userid']."' ");
                                            $ct1 = mysqli_num_rows($q1);

                                            echo $ct1;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-light-green hover-expand-effect">
                                <div class="icon">
                                    <i class="material-icons">check</i>
                                </div>
                                <div class="content">
                                    <div class="text">APPROVED FILES</div>
                                    <div class="number count-to">
                                        <?php

                                            $q2 = mysqli_query($con,"SELECT * from tblfilessubmitted where status = 'Approved' and  facultyid = '".$_SESSION['userid']."' ");
                                            $ct2 = mysqli_num_rows($q2);

                                            echo $ct2;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    
                    </div>
                </div>
                <div class="bg-dash">
                        
                </div>
                <!--end container-->
    
            

            </section>
            <!-- END CONTENT -->

            
        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <?php include "../footer.php"; ?>

    <script>
        $(document).ready(function() {
            $('#dttbl').DataTable( {
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,2 ] } ],"aaSorting": []
            } );
        } ); 
    </script>
         