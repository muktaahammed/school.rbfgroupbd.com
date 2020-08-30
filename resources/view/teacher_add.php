<?php session_start(); ?>

<?php
    require_once("../../database/connect.php");

    $mes = "Something wrong";
    if(isset($_POST['AddTeacher'])){
        $adname = $_POST['adname'];
        $adusername = $_POST['adusername'];
        $ademail = $_POST['ademail'];
        $adpassword = $_POST['adpassword'];
        $adtype = $_POST['adtype'];
   

        if (empty($adname) || empty($adusername) || empty($ademail || empty($adpassword) || empty($adtype) || empty($adcreatedate))){
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
            
            <div class="row mt-5 mb-2">
                <div class="col mb-4">
                    <form method="POST" action="#" name="contactform">
                        <div class="row">
                            <div class="col">
                                <h3 class="text-center">Add Teacher</h3>
                                <!-- <h5 class="text-danger"><?= $msg?></h5> -->
                                <div class="form-group">
                                    <label for="inputAddress">Name<sup class="text-danger">*</sup></label>
                                    <input type="text" name="adname" class="form-control bg-light" id="inputAddress"
                                        placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputAddress">User name<sup class="text-danger">*</sup></label>
                                    <input type="text" name="adusername" class="form-control bg-light" id="inputAddress"
                                        placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Email<sup class="text-danger">*</sup></label>
                                    <input type="email" name="ademail" class="form-control bg-light" id="inputAddress"
                                        placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputAddress">Password<sup class="text-danger">*</sup></label>
                                    <input type="password" name="adpassword" class="form-control bg-light" id="inputAddress"
                                        placeholder="" required>
                                </div>
                                        
                                <div class="form-group">
                                    <label for="inputAddress">Confirm password<sup class="text-danger">*</sup></label>
                                    <input type="password" name="" class="form-control bg-light" id="inputAddress"
                                        placeholder="" required>
                                </div> 
                            
                                <div class="form-group">
                                    <label for="inputAddress">Admin Type<sup class="text-danger">*</sup></label>
                                    <select id="cars" name="adtype" class="form-control bg-light" id="inputAddress">
                                        <option value="">Choose one</option>                                  
                                        <option value="teacher">Teacher</option>                                                                              
                                    </select>   
                                </div>
                               
                                <button type="submit" name="AddTeacher" class="btn btn-primary btn-sm btn-block">Add new admin</button>
                            </div>
                        </div>
                    </form>
                </div>                          
        </div>   
    </div>


    <?php include('../../include/script.php') ?>
    <?php include('../../include/footer.php') ?>