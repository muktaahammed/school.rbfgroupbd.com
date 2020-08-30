<?php 
    session_start();
    include("../../database/connect.php");
    $msg="";

	if (isset($_POST["VerifyFirst"])){

		$adminemail = $_POST['adminemail'];
        $adminpass = $_POST['adminpass']; 
        //$adminpass = sha1($adminpass);
        $usertype = $_POST['usertype'];


        $query = "SELECT * FROM admin_panel WHERE email = ? AND password = ? AND user_type = ?";
        $stmt = $conn->prepare($query);
        $stmt -> bind_param('sss', $adminemail, $adminpass, $usertype);
        $stmt -> execute();
        //$stmt -> close();
        $result = $stmt -> get_result();
        $row = $result -> fetch_assoc();

        session_regenerate_id();
        $_SESSION['adminemail'] = $row['email'];
        $_SESSION['role'] = $row['user_type'];

        if($result->num_rows == 1 && $_SESSION['role'] == "admin"){				
            header('location: admin.php');                    
        }
        else if ($result->num_rows == 1 && $_SESSION['role'] == "teacher"){
            header('location: teacher.php');   
        }
        else{
            $msg = "Something wrong with your email or password";
        }
		 
	}
?>