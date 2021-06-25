<?php

session_start();
include('config/config.php');
if(isset($_POST['loginbut'])){
    $user_name=$_POST['username'];
    $pass_word= $_POST['psw'];
    $sql ="SELECT* FROM admincp WHERE username='".$user_name."' AND password='".$pass_word."'  LIMIT 1";
    $row=pg_query($mysql,$sql);
    $count = pg_num_rows($row);
    $row_user=pg_fetch_array($row);
    if($count>0){
        $_SESSION['dangnhap']=$user_name;
        $_SESSION['id_user']=$row_user['id_admin'];
        header("location:../index.php");
    }
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <form action="" method="POST">
           <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
      
          <button type="submit" name="loginbut" >Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </div>     
        <div class="container" style="background-color:#f1f1f1">
        <a href="../index.php" class="homebutton">Cancle</a>
        <a href="register.php" class="Don't you haven't account">Click Here to Register</a>
         <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
      </form>




