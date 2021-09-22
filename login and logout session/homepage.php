<?php
session_start();

if(!isset($_SESSION['username'])){
    echo "you are logged out";
    header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>

</head>
<style>
    body{
        width:100%;
        height:100%;
            text-align:center;
    }
    </style>

<body>
    <h1 >WELCOME TO OUR HOME PAGE</h1>
    <h3 >HELLO <?php echo $_SESSION['username']; ?> <h3>
        <br>
        <br>
        <br>
        <a href="logout.php">LOGOUT</a>
</body>
</html>