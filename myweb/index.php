<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/index.php">
    <title>TitanShop</title>
    <style>
      * {
    margin: 0;
    padding: 0;
    background: white;
  }
  #APPLESHOP ul {
    list-style: none;
    background-color: black;
    text-align: center;
    padding: 0;
    margin: 0;
  }
  #APPLESHOP li {
    font-size: 24px;
    line-height: 40px;
    height: 40px;
    display: inline-block;
    padding: 20px;
  }
  #APPLESHOP a {
    text-decoration: none;
    color:brown;  
  }
h1{
    list-style: none;
    background: black;
    background-size: cover;
    text-align: center;
    padding: 0;
    margin: 0;
    color:red;
    padding: 5px;
    font-size: 50px;
    padding-top:1.5px;
    padding-bottom:1px;
}
.a {
  display: contents;
  border: 2px solid red;
  background-color: #ccc;
  padding: 10px;
  width: 200px;
}
.b {
  border: 2px solid blue;
  background-color: lightblue;
  padding: 10px;
}
ul#menu {
    padding: 2px;
}
    </style>
</head>
<div class="container-fluid">
    <h1>TitanShop</h1>
</div>
<body>
    <nav id="APPLESHOP">
        <ul id="menu">
          <li><a href="index.php?quanly=trangchu">Home</a></li>
          <li><a href="pages/contactus.php">Contact Us</a></li>
          <li><a href="pages/profile.php">Profile</a></li>
          <li><a href="admincp/register.php">Register</a></li> 
          <li><a href="admincp/login.php">Login</a></li>
          <li><a href="admincp/logout.php">Logout</a></li>
          <li><a href="index.php?quanly=giohang">My Cart</a></li>
        </ul>
      </nav>
<body>
</html>
<?php
if(isset($_GET['quanly']) && $_GET['quanly']=="giohang"){
  include("pages/giohang.php");
}else{
  include("pages/iphone.php");
  include("pages/macbook.php");
  include("pages/dungcukhac.php");
}
?>