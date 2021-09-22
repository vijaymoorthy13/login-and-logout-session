<?php

$server="localhost";
$user="root";
$password="";
$db="signup";

$con= mysqli_connect($server,$user,$password,$db);

if($con){
    ?>
    <script>
        alert("connected successfully");
        </script>
    <?php
}else{
    ?>
    <script>
        alert("Not connected");
        </script>
    <?php
}

?>