<?php
session_start();
include("../admincp/config/config.php");
if (isset($_SESSION['dangnhap'])) {
  $sql = "SELECT*FROM admincp WHERE username='" . $_SESSION['dangnhap'] . "' LIMIT 1 ";
  $sql_user = pg_query($mysql, $sql);
  $row_user = pg_fetch_array($sql_user);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile User</title>
</head>
<body>
  <h1>User Profile</h1>
  <table class="Profiletable" border="1">
    <tr>
      <td>Avartar</td>
      <td><img src="<?php echo $row_user['picture'] ?>"></td>
    </tr>
    <tr>
      <td>User name</td>
      <td><?php echo $row_user['username'] ?></td>
    <tr>
      <td>Full name</td>
      <td><?php echo $row_user['FullName']  ?></td>
    </tr>
    </tr>
    <td>Email</td>
    <td><?php echo $row_user['Email'] ?></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><?php echo $row_user['Phone'] ?></td>
    </tr>
  </table>
  <a href="../index.php" class="homebutton">Home</a>
</body>
</html>





















<style>
    body {
      background-image: url(../image/imageofindex.jpg);
      background-size: cover;
    }
    td {
      width: 250px;
      padding: 10px;
      font-size: larger;
      font-family: arial;
      text-align: center;
    }
    tr:hover {
      background-color: #ddd;
      cursor: pointer;
    }
    table.Profiletable {
      margin: auto;
      background-color: black;
      color: white;
      border: 1px solid white;
      border-collapse: collapse;
    }
    table tr:nth-child(odd) {
      background-color: black;
    }
    table tr:nth-child(even) {
      background-color: blueviolet;
    }
    table tr:nth-child(1) {
      background-color: black;
    }
    img {
      width: 45%;
      margin-left: 5%;
    }
    h1 {
      text-align: center;
      color: whitesmoke;
    }
    a.homebutton {
    padding-left: 720px;
}
element.style {
    color: red;
    font-size: 1.5cm;
}
a.homebutton {
    text-decoration: none;
    border-top: 20px;
    color: red;
}
  </style>