<?php 
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
 
    <h1>You signed in as  : <?= $_SESSION['role'] ?> </h1>
    <button></button>
    <a href="logout.php">Logout</a>
    
</body>
</html>