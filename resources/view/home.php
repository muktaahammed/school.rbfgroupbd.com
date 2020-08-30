<?php
    require_once("../../database/connect.php");

    if(isset($_POST['AddTeacher'])){
        $studentname = $_POST['studentname'];
        $studentemail = $_POST['studentemail'];
        $studedntjoin = $_POST['joingdate'];

        if (empty($studentname) || empty($studentemail || empty($studedntjoin))){
            echo "Input all the fields";
        }
        else{
            $query = "INSERT INTO teachers_table (tname, temail, tjoining) VALUES ('$studentname', '$studentemail', '$studedntjoin')";
            if (mysqli_query($conn, $query)){
               echo "Teacher added successfully !"; 
            }
            else {      
                echo "Error: " . $query . "<br>" . $conn->error;
            }
        }
        mysqli_close($conn);
    }

    if(isset($_POST['AddStudent'])){
        $stdusername = $_POST['stdusername'];
        $studentname = $_POST['studentname'];
        $studentemail = $_POST['studentemail'];
        $studedntjoin = $_POST['joingdate'];
        $studentpass = $_POST['studentpass'];

        if (empty($stdusername) || empty($studentname || empty($studentemail) || empty($studedntjoin) || empty($studentpass))){
            echo "Input all the fields";
        }
        else{
            $query = "INSERT INTO student_table (username, sname, semail, sjoining, spassword) 
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

    if (isset($_POST["StudentLogin"])){
		$stdusernameoremail = $_POST['stdemail'];
		$stdpass = $_POST['stdpass'];

		if (empty($stdusernameoremail) || empty($stdpass)){
			echo  "Input";
		}
		else {
			$query = "SELECT * FROM student_table 
            WHERE (username = '$stdusernameoremail'  OR semail = '$stdusernameoremail')
            AND spassword = '$stdpass'";
			$results = mysqli_query($conn, $query);

			if(mysqli_num_rows($results) > 0){	
                echo "Success";			
				//header('Location: home.php');
							
			}
			else{
				echo  "something wrong with your email or password";
			}
		} 
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!--custom css-->
    <link rel="stylesheet" href="../../bootstrap/custom_css/dashboard.css">
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

</head>
<body>
    <!--Start Contact US-->
<section id="resume">
    <div class="container mt-5">
        <h3 class="text-center">Welcome to Admin Panel</h3>
        <h5 class="text-center text-dark mb-5">ADD EDIT DELETE VIEW</h5>

        <div class="row mt-5 mb-2">
            <div class="col mb-4">
                <form method="POST" action="#" name="contactform">
                    <div class="row">
                        <div class="col">
                            <h3 class="text-center">Add Teacher</h3>
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
                                <label for="inputAddress2">Joining Date<sup class="text-danger">*</sup></label>
                                <input type="date" name="joingdate" class="form-control bg-light" id="inputAddress2"
                                    placeholder="">
                            </div>
                            <button type="submit" name="AddTeacher" class="btn btn-primary btn-sm btn-block">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- add Student -->
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
                                <label for="inputAddress2">Joining Date<sup class="text-danger">*</sup></label>
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

        <form method="POST" action="#" name="contactform">
            <div class="form-group mt-5">
                <label for="inputAddress">Email or Username<sup class="text-danger">*</sup></label>
                <input type="text" name="stdemail" class="form-control bg-light" id="inputAddress"
                    placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Password<sup class="text-danger">*</sup></label>
                <input type="password" name="stdpass" class="form-control bg-light" id="inputAddress2" placeholder="">
            </div>

            <button type="submit" name="StudentLogin" class="btn btn-primary btn-sm btn-block">student Login</button>
        </from>
         <button type="submit" name="AllStudent" class="btn btn-primary btn-sm btn-block">All Student</button>


        </div>
    </div>
</section>
<!--End Contact US-->
<section id="view">
    <div class="container mt-5">
        <h3 class="text-center">View Page</h3>
        <h5 class="text-center text-dark mb-5">View Details</h5>

        <div class="row">

        <div class="col">
            <h1>COL 1</h1>
        </div>

        <div class="col">
            <h1>COL 2</h1>           
        </div>

        <div class="col">
            <style>
                table {
                border-collapse: collapse;
                width: 100%;
                color: #588c7e;
                font-family: monospace;
                font-size: 18px;
                text-align: left;
                }
                th {
                background-color: #588c7e;
                color: white;
                }
                tr:nth-child(even) {background-color: #f2f2f2}
            </style>
            <h1>Table with database</h1>

            <table>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joing</th>
                    <th>Password</th>
                </tr>

            </table>
        </div>       

    </div>

</section>

<section id="view_all_student">
    <div class="container mt-5">
        <h3 class="text-center">View Page</h3>
        <h5 class="text-center text-dark mb-5">View Details</h5>

        <h1>Table with database</h1>

            <table>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joing</th>
                    <th>Password</th>
                </tr>
                    <?php
                        require_once("../../database/connect.php");
                        if (isset($_POST['AllStudent'])){
                            //echo 'Pressed';
                            $query = "SELECT * FROM student_table;";
                            $results = mysqli_query($conn, $query);
                            if (mysqli_num_rows($results) > 0){
                                while($row = mysqli_fetch_assoc($results)){
                            echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['username']."</td>
                            <td>".$row['sname']."</td>
                            <td>".$row['semail']."</td>
                            <td>".$row['sjoining']."</td>
                            <td>".$row['spassword']."</td>
                            </tr>";
                            }
                            echo "</table>";
                            
                        } 
                        else { 
                            echo "0 results"; 
                        }
                        $conn->close();
                    }
                    ?>
            </table>
        </div>       

    </div>


    </div>        

</section>
</body>
</html>