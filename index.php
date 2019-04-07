<?php
require_once('includes/connect.php');
include('includes/users.php');

session_start();
//when the register button is pressed
$msg="";
if(isset($_POST['register'])){
    if($_POST['password']==$_POST['cpassword']){
        //When passwords matches
        $msg="";
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $hashed_password=password_hash($password,PASSWORD_BCRYPT);

        $Users = new Users;
        //checking for similar users
        $user_num = $Users->user_exist($email);
        if($user_num>0){
            //when user exists
        }
        else{
            //when user doesn't exist
           $register =  $Users->register_user($username, $email,$hashed_password);
           if($register==true){
               //successful registration
               header('Location:login.php');
           }
           else{
               //failed registration
               header('Location:index.php');
           }
        }
    }
    else{
        //when passwords don't match
        $msg="Passwords didn't match";
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>LOGIN PAGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
  </head>
  <Body>
    <div class="container">
      <div class="justify-content-md-center" style="margin:100px;">
        <!--Registration form-->
        <div>
            <h2 class="text-center">Sign Up</h2>
        </div>
        <form method="post" action="index.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" aria-describedby="username" placeholder="Enter username" required>
              </div>
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="Enter email" required> 
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
          </div>
          <div class="form-group">
              <label for="cpassword">Confirm Password:</label>
              <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required>
              <small id="password" class="form-text text-muted"><?php  echo $msg; ?></small>
          </div>
          <input type="submit" class="btn btn-primary" name="register" value="Register"/>
        </form>
        <div class="text-center">
          Already A Member ? <a href="login.php">Login</a>
        </div>
      </div>
    </div>
  </Body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>