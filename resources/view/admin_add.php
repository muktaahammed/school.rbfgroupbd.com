<?php session_start(); ?>

<?php
    require_once("../../database/connect.php");
    $response = array();
    
    $mes = "Something wrong";
    if(isset($_POST['AddAdmin'])){
        //$adimage = $_POST['adimage'];
        $adid = $_POST['adid'];
        $adname = $_POST['adname'];
        $adusername = $_POST['adusername'];
        $ademail = $_POST['ademail'];
        $adpassword = $_POST['adpassword'];
        $adtype = $_POST['adtype'];
 
             
        //id admin_image admin_id name username email admin_type password  
        if (is_uploaded_file($_FILES["adimage"]["tmp_name"]) ){
            
            $tmp_file = $_FILES["adimage"]["tmp_name"];
            $img_name = $_FILES["adimage"]["name"];
            $upload_dir = "./../img/admin/".$img_name;
            
            $query = "INSERT INTO admin_panel(admin_image, admin_id, name, username, email, admin_type, password) 
            VALUES ('$img_name', '$adid', '$adname', '$adusername', '$ademail', '$adtype', '$adpassword')";

            if(move_uploaded_file($tmp_file, $upload_dir) && $conn->query($query)){
                
                $response["MESSAGE"] = "UPLOAD SUCCESS";
                $response["STATUS"] = 200;
                header('Location: admin.php');

            }
            else{
                $response["MESSAGE"] = "UPLOAD FAILED";
                $response["STATUS"] = 404;
            }
        }
        else {
            $response["MESSAGE"] = "INVALIED REQUEST";
            $response["STATUS"] = 400;
            echo "Error: " . $query . "<br>" . $conn->error;
        }
                       
    }
        mysqli_close($conn); 
?>

    <?php include('../../include/header.php') ?>
    <?php include('../../include/navbar.php') ?> 
  
    <div class="wrapper mt-5">
        <?php include('../../include/left_nav.php') ?>   
        <div class="mt-4" id="content">
            <div class="container">
                <div class="col mb-4">
                    <form method="POST" action="#" name="contactform" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-center">Add New Admin</h3>
                                <!-- <h5 class="text-danger"><?= $msg?></h5> -->
                                
                                <div class="form-group">                               
                                    <img id="blah" name="adimage" src="#" alt="your image" />
                                </div>

                                <div class="form-group">
                                  <input type='file' name="adimage" onchange="readURL(this);" />                        
                                </div>

                                <div class="form-group">
                                    <label for="inputAddress">Admin ID<sup class="text-danger">*</sup></label>
                                    <input type="text" name="adid" class="form-control bg-light" id="inputAddress"
                                        placeholder="" required>
                                </div>

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
                                        <option value="admin">Admin</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="staff">Staff</option>
                                        <option value="accountant">Accountant</option>
                                        
                                    </select>   
                                </div>
                    
                                <button type="submit" name="AddAdmin" class="btn btn-primary btn-sm btn-block">Add new admin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>  
    </div>


    <?php include('../../include/script.php') ?>
    <?php include('../../include/footer.php') ?>