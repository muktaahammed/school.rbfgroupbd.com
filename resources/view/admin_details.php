<?php session_start(); ?>

<?php
    require_once("../../database/connect.php");
         
    $msg = "";
    $query="SELECT count(id) AS total FROM admin_panel";
    $result=mysqli_query($conn, $query);
    $values=mysqli_fetch_assoc($result);
    $num_rows=$values["total"];
    //echo $num_rows;


?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <title>Admin Details</title>
    <?php include('../../include/header.php') ?>
</head>
<body>
    <?php include('../../include/navbar.php') ?> 
    <div class="wrapper mt-5">
        <?php include('../../include/left_nav.php') ?>
    
        <div class="mt-4" id="content">
            
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Admin Details</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
            <!-- Content Row -->
            <div class="row">                           
                <!-- Admin Page -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-sm-left small font-weight-bold text-primary text-uppercase mb-3">
                                        Total Registered Admin
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">                                      
                                        <h5>Total Admin: <?php echo $num_rows; ?></h5>                                              
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
                                <th scope="col">Joining date</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <?php
                                require_once("../../database/connect.php");
                                    //admin_panel id name username email admin_type password created_at updated_at
                                    $query = "SELECT * FROM admin_panel;";
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
            <div class="row text-center">Customize</div>

            <div class="row">
        
                    <?php
                    // connect to the database
                    include('../../database/connect.php');

                    // get the records from the database
                    if ($result = $conn->query("SELECT * FROM admin_panel ORDER BY id"))
                    {
                        // display records if there are records to display
                        if ($result->num_rows > 0)
                            {
                                // display records in a table
                                echo "<table border='1' cellpadding='10'>";
                                    // set table headers
                                    echo "<tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Admin Type</th>
                                        <th>Joining Date</th>
                                        <th>Update</th>
                                        <th>Delete</th>

                                    </tr>";
                                    while ($row = $result->fetch_object())
                                    {
                                        // set up a row for each record
                                        //INSERT INTO `admin_panel`(`id`, `name`, `username`, `email`, `admin_type`, `password`, `created_at`
                                        echo "<tr>";
                                        echo "<td>" . $row->id . "</td>";
                                        echo "<td>" . $row->name . "</td>";
                                        echo "<td>" . $row->username . "</td>";
                                        echo "<td>" . $row->email . "</td>";
                                        echo "<td>" . $row->admin_type . "</td>";
                                        echo "<td>" . $row->created_at . "</td>";
                                        echo "<td><a href='admin_update.php?id=" . $row->id . "'>Update</a></td>";
                                        echo "<td><a href='admin_delete.php?id=" . $row->id . "'>Delete</a></td>";
                                        echo "</tr>";
                                    }

                                echo "</table>";
                            }
                                // if there are no records in the database, display an alert message
                        else{
                            echo "No results to display!";
                            }
                    }
                        // show an error if there is an issue with the database query
                    else
                    {
                        echo "Error: " . $conn->error;
                    }
                    // close database connection
                    $conn->close();

                ?>

            </div>

        </div>
    </div>


    <?php include('../../include/script.php') ?>
    <?php include('../../include/footer.php') ?>
</body>

</html>