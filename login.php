<?php
require_once('includes/connect.php');
include('includes/users.php');

session_start();
$users = new Users;
$error_msg ="";
if(isset($_GET['login'])){
//once login button is pressed
  $username = $_GET['username'];
  $password = $_GET['password'];
  $num_user = $users->user_exist($username);
  //checking if user exists
  if($num_user==1){
    //user exist
    $_SESSION['username'] = $username;
  }else{
    //user not existing
    $error_msg="Invalid Username/Password. Try Again";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SIGN IN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
  </head>
  <Body>
    <div class="container">
      <div class="justify-content-md-center" style="margin:100px;">
        <!--Login form-->
        <div>
            <h1 class="text-center">Sign In</h1>
        </div>
        
          <?php
            //error message
            echo $error_msg;
          ?>
        
        <form method="get" action="Dashboard.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" aria-describedby="username" placeholder="Enter username" required>
              </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
          </div>
          <input type="submit" class="btn btn-primary" name="login" value="Login"/>
        </form>
        <div class="text-center">
          Not Yet A Member ? <a href="index.php">Register</a>
        </div>
      </div>
    </div>
  </Body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>