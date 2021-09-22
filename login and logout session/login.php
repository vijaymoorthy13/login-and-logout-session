<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Login</title>
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
    $email= $_POST['email'];
    $password= $_POST['password'];

    $email_search= "select * from registration where email='$email'";
    $query= mysqli_query($con,$email_search);

    $email_count= mysqli_num_rows($query);
     
    if($email_count){
        $email_pass= mysqli_fetch_assoc($query);

        $db_pass= $email_pass['password'];

        $_SESSION['username'] = $email_pass['username'];

        $pass_decode = password_verify($password,$db_pass);

        
        if($pass_decode){
           ?>
           <script>
             alert ("login successfully");
             location.replace("homepage.php");
             </script>
            
           <?php
        }else{
           ?>
           <script>
            alert ("Incorrect Password");
             </script>
           <?php
        }
       }else{
        ?>
        <script>
         alert ("Invalid Email");
          </script>
        <?php
       
        }
        
    }    
?>
 

    <div class="container" >
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">LOGIN</p>
            
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            
            <div class="input-group">
                <input type="password" placeholder="Create password" name="password" value="" required>
            </div>
            
            <div class="input-group">
                <button type="submit" name="submit" class="btn">LOGIN</button>
            </div>
            <p class="login-register-text">Don't Have an account?<a href="register.php"> Register Here</a></p>
        </form>
    </div>
</body>
</html>