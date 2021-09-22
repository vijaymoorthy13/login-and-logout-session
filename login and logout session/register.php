<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Register</title>
    <style type="text/css">
       *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
         body{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(home11.jpg);
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
          }
          .container{
    width: 400px;
    min-height: 400px;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,0.3);
     padding: 40px 30px;
}
.container .login-text{
    color: #111;
    font-weight: 500;
    font-size: 1.2rem;
    text-align: center;
    margin-bottom: 20px;
    display: block;
}
.container .login-text .input-group{
    width: 100%;
    height: 50px;
    margin-bottom: 25px;
}
.container  .input-group input{
    width: 100%;
    height: 100%;
    border: 2px solid #e7e7e7;
    padding: 15px 20px;
    font-size: 1rem;
    border-radius: 30px;
    background: transparent;
    outline: none;
    transition: .3s;
    margin-bottom:15px
}
.btn{
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #426782;
    outline: none;
    border-radius: 30px;
    font-size: 1.3rem;
    color: #fff;
    cursor: pointer;
    transition: .3s;
}

.container .btn:hover{
    transform: translateY(-5px);
    background: #6c5ce7;
}
.login-register-text{
    color: #111;
    font-weight: 500;
}
.login-register-text {
    text-align: center;
    letter-spacing: 1px;
    width: 100%;
    margin-top: 20px;
}
.login-register-text a{
    text-decoration: none;
    color: #6c5ce7;
}
        </style>
    
</head>
<body>  

<?php  
 
 include 'dbconn.php';  

if(isset($_POST['submit'])){
   $username = mysqli_real_escape_string($con, $_POST['username']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
   $password = mysqli_real_escape_string($con, $_POST['password']);
   $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);


   $pass= password_hash($password, PASSWORD_BCRYPT);
   $cpass= password_hash($cpassword, PASSWORD_BCRYPT);   

   $emailquery=" select * from registration where email= '$email' ";
   $query= mysqli_query($con,$emailquery);
    
   $emailcount = mysqli_num_rows($query);

   if($emailcount>0){
       echo "email already exist";
   }else{
       if($password === $cpassword){
          $insertquery= "insert into registration( username,email,mobile,password,cpassword) values('$username','$email','$mobile','$pass','$cpassword')";

          $iquery= mysqli_query($con, $insertquery);
         
          if($iquery){
            ?>
            <script>
                alert("inserted successfully");
                </script>
            <?php
        }else{
            ?>
            <script>
                alert("Not inserted");
                </script>
            <?php
        }
        
       }else{
            ?>
           <script>
           alert("Password is not matching");
           </script>
           <?php
       }
   }

}
?>
    <div class="container" >
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">REGISTER</p>
            <div class="input-group " >
                <input  type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Phone number" name="mobile" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Create password" name="password" value="" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm password" name="cpassword" required>
            </div>
            <div class="input-group">
                <button type="submit" name="submit" class="btn">LOGIN</button>
            </div>
            <p class="login-register-text">Have an account?<a href="login.php">Login Here</a></p>
        </form>
    </div>
</body>
</html>