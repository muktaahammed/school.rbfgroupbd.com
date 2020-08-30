<?php
    include("../../database/connect.php");
?>
<?php
    $username = $_POST["username"];
    $password = $_POST["password"];

  if(isset($_POST['submit'])){
    $select = mysql_query ("SELECT * FROM admin_auth WHERE username = '".$username."' AND password = '".$password."' ");
    $fetch=mysql_fetch_array($select);

        if(mysql_num_rows($fetch) == 1){              		               
               echo "Connected successfully";
               header('Location: home.php');          
        }
         else{
           echo "Connected successfully";
        }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Auth</title>
    <!--custom css-->
    <link rel="stylesheet" href="../../bootstrap/custom_css/index.css">

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!--Notify for ajax-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- Google Icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>

    </style>
    <!--error in input-->
    <script src="custom_js/gen_validatorv31.js"></script>
    <!--error in input-->

</head>

<body class="body-design">
    <div class="container-fluid">
        <!--Left Side-->
        <div class="row gutters row-cols">
            <div class="col-4 py-3 px-lg-5 border bg-light">
                <h4 class="text-uppercase mt-5 margin-scale">C</h4>
                <p class="mt-5 margin-scale">Please verify yourself to access</p>
                <p class="margin-scale">If you are a registered person use your email and password</p>
                <form class="from-design" action="#" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="button" href="home.php" name="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                    <a class="btn btn-primary btn-lg btn-block" href="home.php" role="button">Login ></a>
                  

                </form>
            </div>
            <!--Left Side-->

            <!--Right Side-->
            <div class="col">
                <div class="img-fullview"></div>
            </div>
            <!--Right Side-->
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <!--Notify for ajax-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</body>

</html>