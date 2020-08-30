<?php session_start(); ?>

<?php
    require_once("../../database/connect.php");

    if(isset($_POST['AddAdmin'])){
        $adname = $_POST['adname'];
        $adusername = $_POST['adusername'];
        $ademail = $_POST['ademail'];
        $adpassword = $_POST['adpassword'];
        $adtype = $_POST['adtype'];
        $adcreatedate = $_POST['adcreatedate'];

        if (empty($adname) || empty($adusername) || empty($ademail || empty($adpassword) || empty($adtype) || empty($adcreatedate))){
            echo "Input all the fields";
        }
        else{
            $query = "INSERT INTO admin_panel (name, user_name, email, password, user_type, created) 
            VALUES ('$adname', '$adusername', '$ademail', '$adpassword', '$adtype', '$adcreatedate')";
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
            
            <h3 class="text-center">This is the blank One for Accountant !!!</h3>
                           
        </div>   
    </div>


    <?php include('../../include/script.php') ?>
    <?php include('../../include/footer.php') ?>