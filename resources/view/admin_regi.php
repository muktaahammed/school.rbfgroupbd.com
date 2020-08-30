<?php 
    session_start();

    require_once("../../database/connect.php");

    if(isset($_POST['AddAdmin'])){
        $adname = $_POST['adname'];
        $ademail = $_POST['ademail'];
        $adpassword = $_POST['adpassword'];
        $adtype = $_POST['adtype'];
        $adcreatedate = $_POST['adcreatedate'];

        if (empty($adname) || empty($ademail || empty($adpassword) || empty($adtype) || empty($adcreatedate))){
            echo "Input all the fields";
        }
        else{
            $query = "INSERT INTO admin_panel (name, email, password, user_type, created) 
            VALUES ('$adname', '$ademail', '$adpassword', '$adtype', '$adcreatedate')";
            if (mysqli_query($conn, $query)){
               echo "Admin added successfully !"; 
            }
            else {      
                echo "Error: " . $query . "<br>" . $conn->error;
            }
        }
        mysqli_close($conn);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>

        <link href="../../bootstrap/custom_css/admin.css" rel="stylesheet" id="style">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="../../bootstrap/js/admin.js"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" 
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <!-- Goole Icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
            <div class="col mb-4">
                <form method="POST" action="#" name="contactform">
                    <div class="row">
                        <div class="col">
                            <h3 class="text-center">Add Teacher</h3>
                            <div class="form-group">
                                <label for="inputAddress">Name<sup class="text-danger">*</sup></label>
                                <input type="text" name="adname" class="form-control bg-light" id="inputAddress"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Email<sup class="text-danger">*</sup></label>
                                <input type="email" name="ademail" class="form-control bg-light" id="inputAddress"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Password<sup class="text-danger">*</sup></label>
                                <input type="email" name="adpassword" class="form-control bg-light" id="inputAddress"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Confirm password<sup class="text-danger">*</sup></label>
                                <input type="email" name="" class="form-control bg-light" id="inputAddress"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Admin Type<sup class="text-danger">*</sup></label>
                                <select id="cars" name="adtype" class="form-control bg-light" id="inputAddress">
                                    <option value="volvo">Teacher</option>
                                    <option value="saab">Staff</option>
                                    <option value="fiat">Accountant</option>
                                    <option value="audi">Teacher</option>
                                </select>   
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Joining Date<sup class="text-danger">*</sup></label>
                                <input type="date" name="adcreatedate" class="form-control bg-light" id="inputAddress2"
                                    placeholder="">
                            </div>
                            <button type="submit" name="AddAdmin" class="btn btn-primary btn-sm btn-block">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>



</body>
    <!--online js-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"crossorigin="anonymous"></script>
</body>
</html>