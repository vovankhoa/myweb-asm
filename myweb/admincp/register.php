<?php
    include('../admincp/config/config.php');
?>
<html>
 <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/register.css">
    </head>
<body>
    <?php
        if(isset($_POST['registerbut'])){
        if(empty($_POST['uname']) or empty($_POST['psw'])){
            echo'<p style="color:red">Please not empty</p>';
        }   else{
            $username = $_POST['uname'];
            $password = $_POST['psw'];
            $password2 = $_POST['psw1'];
            if($password2 != $password){
            echo'<p style="color:red">Password not same</p>';
             } else{
            $sql = "SELECT * FROM admincp WHERE username ='$username'";
            $query = pg_query($mysql,$sql);
            $num = pg_num_rows($query);
            if($num == 0){
                $sql2 = "INSERT INTO admincp (username,password) VALUES('".$username."','".$password."')";
                $them = pg_query($mysql, $sql2);
                if($them){
                    echo'<p style="color:black">Successful Register</p>';
                }
            }
        }
    }
    }
?>
    <form method="POST" action="register.php">  
           <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" username="Enter Username" name="uname" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" password="Enter Password" name="psw" required>

          <label for="psw"><b>Confirm Password</b></label>
          <input type="password" password2="Confirm Password" name="psw1" required>
      
          <button type="submit" name='registerbut' >Register</button>

          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </div>     
        <div class="container" style="background-color:#f1f1f1">
          <a href="../index.php" class="cancelbtn">Cancel</a>     
        </div>
      </form>
      </body>
</html>
      




      