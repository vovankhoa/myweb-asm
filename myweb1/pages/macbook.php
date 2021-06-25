<?php
include("admincp/config/config.php");
$sql_sanpham="SELECT*FROM tb_product where danhmuc='laptop' LIMIT 15";
$query_sanpham=pg_query($mysql,$sql_sanpham);


?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/iphone.css">
        <style>
            img.\31 23 {
            width: 98%;
            }
    body {
    background-image: url(image/imageofproduct.jpg);
    background-size: cover;
    font-size: 16px;
    font-family: Lato, sans-serif;
  }
  section {
    text-align: center;
  }
  article {
    background-color: #262626;
    display: inline-block;
    width: 23%;
    margin: 80px 20px 0 20px;
    border: 5px solid #f3f3f3;
    color: #a1a1a1;
  }
  article h1 {
    font-size: 1.5em;
    color: #FFF;
  }
  article .price {
    font-size: 3em;
    font-weight: bold;
    color: #27dcc4;
    margin-top: 10px;
  }
  article ul {
    padding: 0;
  }
  article button {
    background-color: #27dcc4;
    color: #FFFFFF;
    margin: 10px 0;
    font-size: 0.9em;
    cursor: pointer;
    border: 5px solid #00fff2;
  }
  article ul li {
    list-style-type: none;
    padding: 5px 0;
  }
  article button:hover {
    background-color: #acacac;
  }
        </style>
    </head>
    <body>
            <section>
                <?php while($row_sanpham=mysqli_fetch_array($query_sanpham)){ ?>
                <article>
                    <h1><?php echo $row_sanpham['PName'] ?></h1>
                    <img src="<?php echo $row_sanpham['Picture'] ?>" class="123"> 
                    <div class="price"><?php echo $row_sanpham['Price'].'$' ?></div>
                    <ul>
                    </ul>
                    <form action="pages/buy.php?idproduct=<?php echo $row_sanpham['PID'] ?>" method="POST">
                    <input type="submit" class="but" value="Buy" name="themgiohang">
                    </form>
                    <a href="sanpham.php?idproduct=<?php echo $row_sanpham['PID'] ?>"><button>See Details</button></a>
                </article>
                <?php }?>
             </section>
        </body>