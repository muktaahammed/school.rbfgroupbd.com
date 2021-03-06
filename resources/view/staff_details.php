<?php session_start(); ?>

<?php
    require_once("../../database/connect.php");

    if(isset($_POST['AddAdmin'])){
        $adname = $_POST['adname'];
        $adusername = $_POST['adusername'];
        $ademail = $_POST['ademail'];
        $adpassword = $_POST['adpassword'];
        $adtype = $_POST['adtype'];

        if (empty($adname) || empty($adusername) || empty($ademail || empty($adpassword) || empty($adtype) )){
            echo "Input all the fields";
        }
        else{
            $query = "INSERT INTO admin_panel (name, username, email, password, admin_type) 
            VALUES ('$adname', '$adusername', '$ademail', '$adpassword', '$adtype')";
            if (mysqli_query($conn, $query)){
               echo "Admin added successfully !";
               header('Location: admin.php');
            }
            else {      
                echo "Error: " . $query . "<br>" . $conn->error;
            }
        }
        mysqli_close($conn);
    }

?> 

    <?php include('../../include/header.php') ?>
    <?php include('../../include/navbar.php') ?> 
  
    <div class="wrapper mt-5">
        <?php include('../../include/left_nav.php') ?>
    
        <div class="mt-4" id="content">
            
           
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Staff Details</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
            <!-- Content Row -->
            <div class="row">                           
                <!-- Teacher Page -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-sm-left small font-weight-bold text-primary text-uppercase mb-3">
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
            </div>
            
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">User name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Admin type</th>
                                <th scope="col">Creatation date</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                require_once("../../database/connect.php");

                                    $query = "SELECT * FROM admin_panel where admin_type='staff';";
                                    $results = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($results) > 0){
                                        while($row = mysqli_fetch_assoc($results)){
                                            echo "<tr>
                                                <td>".$row['id']."</td>
                                                <td>".$row['name']."</td>
                                                <td>".$row['username']."</td>
                                                <td>".$row['email']."</td>
                                                <td>".$row['admin_type']."</td>
                                                <td>".$row['created_at']."</td>
                                                <td>Update</td>
                                                <td>Delete</td>
                                                
                                            </tr>";
                                        }
                                        echo "</table>";
                                        
                                    } 
                                    else { 
                                        echo "0 results"; 
                                    }
                                    $conn->close();
                                
                                ?>                            
                            </tr>                                
                        </tbody>
                    </table>
                </div>
            </div>                          
        </div>   
    </div>


    <?php include('../../include/script.php') ?>
    <?php include('../../include/footer.php') ?>