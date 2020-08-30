
<?php 
    include("../../database/connect.php");

	if (isset($_POST["SubmitForm"])){

		$adminemail = $_POST['adminemail'];
		$adminpass = $_POST['adminpass'];

		if (empty($adminemail) || empty($adminpass)){
			echo  "Input";
		}
		else {
			echo  "All inputed done";
			$query = "SELECT * FROM admin_panel WHERE email = '".$adminemail."' AND password = '".$adminpass."'";
			$results = mysqli_query($conn, $query);

			if(mysqli_num_rows($results) > 0){				
				header('Location: home.php');
							
			}
			else{
				echo  "something wrong with your email or password";
			}
		} 
	}
?>
<!--author:starttemplate-->
<!--reference site : starttemplate.com-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="login form">
    <meta name="author" content="school">
    <title>Login Form</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link href="index.css" rel="stylesheet" id="style">
    <!-- Bootstrap core Library -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <!-- Font Awesome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-dark'>Login Form</h1>
            <div class="form-login"></br>
                <h4>Secure Login</h4>
                </br>
                <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username"/>
                </br></br>
                <input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="password"/>
                </br></br>
                <div class="wrapper">
                        <span class="group-btn">
                            <a href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>
                        </span>
                </div>
            </div>
        </div>
    </div>
    </br></br></br>
    <!--footer-->
    <div class="footer text-white text-center">
    </div>
    <!--//footer-->
</div>
</body>
</html>
