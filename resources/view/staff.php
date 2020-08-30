<?php 
    session_start();

    if(!isset($_SESSION['email']) || $_SESSION['role']!="admin"){
        header("location: index.php");
    };
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Hi : <?= $_SESSION['email'] ?> </h1>
    <h1>You signed in as  : <?= $_SESSION['role'] ?> </h1>
    <h3 href="logout.php">Logout</h3>
    
</body>
</html>