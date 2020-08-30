<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
       <?php include('../../include/header.php') ?>

</head>
<body>
 <?php include('../../include/navbar.php') ?> 
  
    <div class="wrapper bg-light mt-5">
        <?php include('../../include/left_nav.php') ?>
    
        <div class="mt-4" id="content">           
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Main Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> 
                    Generate Report
                </a>
            </div>

            <!--Notice or emergency update-->
            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            
            <!-- Admin Page -->
            <h3>Admin Panel Details</h3>  
            <!-- Content Row -->
            <div class="row">
                <!-- Admin -->                                     
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-sm-left small font-weight-bold text-primary text-uppercase mb-3">
                                        Total Registered Admin
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                include("../../database/connect.php");
                                                $msg = "";
                                                $query="SELECT count(id) AS total FROM admin_panel";
                                                $result=mysqli_query($conn, $query);
                                                $values=mysqli_fetch_assoc($result);
                                                $num_rows=$values["total"];
                                                //echo $num_rows;
                                            ?>
                                        <h5>Total Admin: <?php echo $num_rows; ?></h5>                                              
                                    </div>
                                </div>                      
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Teacher -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-sm-left small font-weight-bold text-primary text-uppercase mb-3">
                                        Total Registered Teacher
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                            include("../../database/connect.php");
                                            $msg = "";
                                            $query="SELECT count(id) AS total FROM admin_panel where admin_type='teacher'";
                                            $result=mysqli_query($conn, $query);
                                            $values=mysqli_fetch_assoc($result);
                                            $num_rows=$values["total"];
                                            //echo $num_rows;
                                            ?>
                                        <h5>Total Teacher: <?php echo $num_rows; ?></h5>
                                    </div>                                                                 
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Staff -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-sm-left small font-weight-bold text-primary text-uppercase mb-1">
                                        Total Registered Staff
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                            include("../../database/connect.php");
                                            $msg = "";
                                            $query="SELECT count(id) AS total FROM admin_panel where admin_type='staff'";
                                            $result=mysqli_query($conn, $query);
                                            $values=mysqli_fetch_assoc($result);
                                            $num_rows=$values["total"];
                                            //echo $num_rows;
                                            ?>
                                        <h5>Total Staff: <?php echo $num_rows; ?></h5>
                                    </div>
                                </div>                             
                            </div>
                        </div>
                    </div>
                </div>
                   
                <!-- Accountent -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-sm-left small font-weight-bold text-primary text-uppercase mb-1">
                                    Total Registered Accountent
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                        include("../../database/connect.php");
                                        $msg = "";
                                        $query="SELECT count(id) AS total FROM admin_panel where admin_type='accountant'";
                                        $result=mysqli_query($conn, $query);
                                        $values=mysqli_fetch_assoc($result);
                                        $num_rows=$values["total"];
                                        //echo $num_rows;
                                    ?>
                                    <h5>Total Accountent: <?php echo $num_rows; ?></h5>

                                </div>
                            </div>
                            <!-- <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div> -->
                        </div>
                        </div>
                    </div>
                </div> 

            </div>
            
            <!-- Student -->
            <h3 class="text-warning">All Students Details</h3>                
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Students
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        include("../../database/connect.php");
                                        $msg = "";
                                        $query="SELECT count(id) AS total FROM student_table";
                                        $result=mysqli_query($conn, $query);
                                        $values=mysqli_fetch_assoc($result);
                                        $num_rows=$values["total"];
                                        //echo $num_rows;
                                        ?>
                                        <h5>Total Students: <?php echo $num_rows; ?></h5>
                                    </div>
                                </div>
                                <!-- <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Earnings (Annual)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        $215,000
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>

            <!--Class wise Student -->
            <h3 class="text-warning">Class Wise Students Details</h3>                
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Students
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        include("../../database/connect.php");
                                        $msg = "";
                                        $query="SELECT count(id) AS total FROM student_table";
                                        $result=mysqli_query($conn, $query);
                                        $values=mysqli_fetch_assoc($result);
                                        $num_rows=$values["total"];
                                        //echo $num_rows;
                                        ?>
                                        <h5>Total Students: <?php echo $num_rows; ?></h5>
                                    </div>
                                </div>
                                <!-- <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Earnings (Annual)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        $215,000
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        </div>
     
    </div>

    <?php include('../../include/script.php') ?>
    <?php include('../../include/footer.php') ?>

</body>

</html>
 
   





