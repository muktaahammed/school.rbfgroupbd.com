<?php session_start(); ?>
<!-- 
    
Database: dbschool »Table: student_table
id std_name std_username std_email std_mobile std_father_name std_mother_name std_parent std_parent_mobile std_location
 -->
<?php
    require_once("../../database/connect.php");

    if(isset($_POST['AddStudent'])){
        $stdname = $_POST['stdusername'];
        $stdusername = $_POST['studentname'];
        $stdemail = $_POST['studentemail'];
        $studedntjoin = $_POST['joingdate'];
        $studentpass = $_POST['studentpass'];

        if (empty($stdusername) || empty($studentname || empty($studentemail) || empty($studedntjoin) || empty($studentpass))){
            echo "Input all the fields";
        }
        else{
            $query = "INSERT INTO student_table (std_name, std_username, std_email, std_mobile, std_father_name, std_mother_name, std_parent, std_parent_mobile,std_location ) 
            VALUES ('$stdusername', '$studentname', '$studentemail', '$studedntjoin', '$studentpass');";
            if (mysqli_query($conn, $query)){
               echo "Student added successfully !"; 
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
                                                  
            <div class="col pl-5 border-left">
                <form method="POST" action="#" name="contactform">
                    <div class="row">
                        <div class="col">
                            <h3 class="text-center">Add Student</h3>
                            <div class="form-group">
                                <label for="inputAddress">Username<sup class="text-danger">*</sup></label>
                                <input type="text" name="stdusername" class="form-control bg-light" id="inputAddress"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Name<sup class="text-danger">*</sup></label>
                                <input type="text" name="studentname" class="form-control bg-light" id="inputAddress"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Email<sup class="text-danger">*</sup></label>
                                <input type="email" name="studentemail" class="form-control bg-light" id="inputAddress"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Ragistred Date<sup class="text-danger">*</sup></label>
                                <input type="date" name="joingdate" class="form-control bg-light" id="inputAddress2"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Password<sup class="text-danger">*</sup></label>
                                <input type="password" name="studentpass" class="form-control bg-light" id="inputAddress2"
                                    placeholder="">
                            </div>
                            <button type="submit" name="AddStudent" class="btn btn-primary btn-sm btn-block">Add new student</button>                   
                        </div>
                    </div>
                </form>
            </div>
        </div>   
    </div>


    <?php include('../../include/script.php') ?>
    <?php include('../../include/footer.php') ?>