<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <title>Update Admin</title>
    <?php include('../../include/header.php') ?>
</head>
<body>

    <?php include('../../include/navbar.php') ?> 

        <div class="wrapper mt-5">
        <?php include('../../include/left_nav.php') ?>
    
        <div class="mt-4" id="content">
            
            <h3 class="text-center">This is the blank One !!!</h3>
            <div class="row">

            <?php
            /*Allows the user to both create new records and edit existing records*/
            // connect to the database
            include("../../database/connect.php");

            // creates the new/edit record form
            // since this form is used multiple times in this file, I have made it a function that is easily reusable
            function renderForm(
                //INSERT INTO `admin_panel`(`id`, `name`, `username`, `email`, `admin_type`, `password`, `created_at`, `updated_at`
                $name = '', 
                $username ='', 
                $email ='', 
                $admin_type ='', 
                $created_at ='', 
                $updated_at ='', 
                $id = ''
            )
            { ?>
                                 
                <?php 
                    if ($error != '') {
                        echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
                    } 
                ?>

                <form action="" method="post">
                    <div>
                        <?php 
                            if ($id != '') { 
                                ?>
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                <p>ID: <?php echo $id; ?></p>
                                
                                <?php 
                            }   
                        ?>
                        <!-- `admin_panel` `id`, `name`, `username`, `email`, `admin_type`,  `created_at`, `updated_at` -->
                    
                        <strong>Name: *</strong> 
                        <input type="text" name="name" value="<?php echo $name; ?>"/><br/>
                        <strong>Username: *</strong> 
                        <input type="text" name="username" value="<?php echo $username; ?>"/>
                        <strong>Email: *</strong> 
                        <input type="text" name="email" value="<?php echo $email; ?>"/>
                        <strong>Admin Type: *</strong> 
                        <input type="text" name="admin_type" value="<?php echo $admin_type; ?>"/>
                        
                        <input type="submit" name="submit" value="Submit" />
                    </div>
                </form>
           

                <?php 
            }
            /*EDIT RECORD*/
            // if the 'id' variable is set in the URL, we know that we need to edit a record
            if (isset($_GET['id'])) {
                // if the form's submit button is clicked, we need to process the form
                if (isset($_POST['submit'])){
                    // make sure the 'id' in the URL is valid
                    if (is_numeric($_POST['id'])){
                        // get variables from the URL/form
                        $id = $_POST['id'];
                        $name = htmlentities($_POST['name'], ENT_QUOTES);
                        $username = htmlentities($_POST['username'], ENT_QUOTES);
                        $email = htmlentities($_POST['email'], ENT_QUOTES);
                        $admin_type = htmlentities($_POST['admin_type'], ENT_QUOTES);
                        $created_at = htmlentities($_POST['created_at'], ENT_QUOTES);
                        $updated_at = htmlentities($_POST['updated_at'], ENT_QUOTES);
                        // check that firstname and lastname are both not empty
                        if ($name == '' || $username == '' || $email == '' || $admin_type == '' || $created_at == '' || $updated_at == ''){
                            // if they are empty, show an error message and display the form
                            $error = 'ERROR: Please fill in all required fields!';
                            renderForm($name, $username, $email, $admin_type, $created_at, $updated_at, $error, $id);
                        }
                        else{
                            // if everything is fine, update the record in the database
                            if ($stmt = $conn->prepare("UPDATE admin_panel SET name = ?, username = ?, email = ?, admin_type = ?, created_at = ?, updated_at = ? WHERE id=?")) {
                                $stmt->bind_param("ssssiii", $name, $username, $email, $admin_type, $created_at, $updated_at, $id);
                                $stmt->execute();
                                $stmt->close();
                            }
                            // show an error message if the query has an error
                            else{
                                echo "ERROR: could not prepare SQL statement.";
                            }
                            // redirect the user once the form is updated
                            header("Location: admin_details.php");
                        }
                    }
                        // if the 'id' variable is not valid, show an error message
                    else{
                        echo "Error!";
                    }
                }
                // if the form hasn't been submitted yet, get the info from the database and show the form
                else{
                    // make sure the 'id' value is valid
                    if (is_numeric($_GET['id']) && $_GET['id'] > 0) {
                        // get 'id' from URL
                        $id = $_GET['id'];

                        // get the recod from the database
                        if($stmt = $conn->prepare("SELECT * FROM admin_panel WHERE id=?"))  {
                            $stmt->bind_param("i", $id);
                            $stmt->execute();

                            $stmt->bind_result($id, $name, $username, $email, $admin_type, $created_at, $updated_at);
                            $stmt->fetch();

                            // show the form
                            renderForm($name, $username, $email, $admin_type, $created_at, $updated_at, NULL, $id);

                            $stmt->close();
                        }
                        // show an error if the query has an error
                        else {
                            echo "Error: could not prepare SQL statement";
                        }
                    }
                    // if the 'id' value is not valid, redirect the user back to the view.php page
                    else {
                        header("Location: admin_details.php");
                    }
                }
                // if the form hasn't been submitted yet, show the form
                
            }
            else{
                renderForm();
                }
                // close the mysqli connection
                $conn->close();
            ?>
            </div>              
        </div>   
    </div>
    

    <?php include('../../include/script.php') ?>
    <?php include('../../include/footer.php') ?>
</body>

</html>