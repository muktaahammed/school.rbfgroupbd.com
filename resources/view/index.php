<?php 
    session_start();
    include("../../database/connect.php");
    $msg = "";

	if (isset($_POST["VerifyFirst"])){

		$adminemail = $_POST['adminemail'];
        $adminpass = $_POST['adminpass']; 
        //$adminpass = sha1($adminpass);
        $usertype = $_POST['usertype'];
        //INSERT INTO `admin_panel`(`id`, `name`, `username`, `email`, `admin_type`, `password`) 
        $query = "SELECT * FROM admin_panel WHERE email = ? AND password = ? AND admin_type = ?";
        $stmt = $conn -> prepare($query);
        $stmt -> bind_param('sss', $adminemail, $adminpass, $usertype);
        $stmt -> execute();
        //$stmt -> close();
        $result = $stmt -> get_result();
        $row = $result -> fetch_assoc();

        session_regenerate_id();
        $_SESSION['adminemail'] = $row['email'];
        $_SESSION['role'] = $row['admin_type'];

        if($result->num_rows == 1 && $_SESSION['role'] == "admin"){				
            header('location: admin.php');                    
        }
        else if ($result->num_rows == 1 && $_SESSION['role'] == "teacher"){
            header('location: teacher.php');   
        }
        else if ($result->num_rows == 1 && $_SESSION['role'] == "accountant"){
            header('location: accountant.php');   
        }
        else{
            $msg = "Something wrong with your email or password or in choice";
        }
		 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Auth</title>
    <?php include('../../include/header.php') ?>

</head>

<body class="body-design bg-warning">
    <!--Start-->
    <div class="row bg-light">
        <div class="col-md-4 col-sm-6 mt-5 left-box">                            
            <div class="from-design">
                <h1 class="mt-5 text-center">Welcome</h1>
                <h4 class="text-center">TO</h4>
                <h3 class="text-center">SELF INDEPENDENT SCHOOL</h3>              
                <h4 class="mt-5 text-center text-danger"><b>Please verify yourself to access</b></h4>            
            </div>

            <form class="from-design px-4 py-4" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="adminemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="adminpass" class="form-control" id="exampleInputPassword1" required>
                </div>
                <h5 class="text-danger"><?= $msg?></h5>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label ml-5" for="exampleCheck1">Remember me</label>
                </div>
                <div class="form-group form-check mt-5">
                   <!-- <label for="usertype">I am a </label> -->
                    <input type="radio" name="usertype" value="admin" class="custom-radio" required>&nbsp;Admin | </label>                    
                    <input type="radio" name="usertype" value="teacher" class="custom-radio" required>&nbsp;Teacher | </label>
                    <input type="radio" name="usertype" value="accountant" class="custom-radio" required>&nbsp;Accountant |</label>
                    <input type="radio" name="usertype" value="staff" class="custom-radio" required>&nbsp;Staff </label>
                </div>
                <button type="submit" name="VerifyFirst" class="btn btn-block btn-primary">Submit</button>               
            </form>            
        </div>

        <div class="col-md-8 col-sm-12">   
            <img class="img-fluid" src="../../resources/img/auth_bg.png" alt="Responsive image">
                
            </div>
        </div>  

    </div>
    <!--End-->
    <?php include('../../include/script.php') ?>

</body>
</html>