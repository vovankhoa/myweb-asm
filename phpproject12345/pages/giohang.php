<style>
img {
    width: 150px;
}
.controllbut {
    float: right;
    margin-right: 20%;
}
</style>
<?php
    session_start();
?>

<p>Your Cart:</p>
<div class="oderlist">
    <table border="1px solid" class="odertable" style="width:80%; text-align: center; border-collapse: collapse;">
    <tr>
        <th>Id product</th>
        <th>Images</th>
        <th>Product name</th>
        <th>Amount</th>
        <th>Cost</th>
        <th>Edit</th>
        
    </tr>
<?php
    if(isset($_SESSION['cart'])){
        $i=0;
        $tongtien=0;
            foreach($_SESSION['cart'] as $cart_item){
                $thanhtien=$cart_item['Unit']*$cart_item['Price'];
                $tongtien=$tongtien+$thanhtien;
                $i++;
?>     
    <tr>
        <td><?php echo $i ?></td>
        <td><img src="<?php echo $cart_item['Picture'] ?>" ></td>
        <td><?php echo $cart_item['PName'] ?></td>
        <td>
        <a style="font-size: 20px; text-decoration: none;" href="pages/giohang/themgiohang.php?tru=<?php echo $cart_item['id'] ?>">-</a>
        <?php echo $cart_item['Unit'] ?>
        <a style="font-size: 20px; text-decoration: none;" href="pages/giohang/themgiohang.php?cong=<?php echo $cart_item['id'] ?>">+</a>
        </td>
        <td><?php echo $cart_item['Price'].'$' ?></td>
        <td><a href="" class="editbut"><a href="pages/giohang/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Delete</a></a></td>
    </tr>
<?php   
            }
    ?>
    <tr>
        <td colspan="6"> Total Cost:<?php echo $tongtien.'$' ?> </td>
    </tr>
    </table> 
    <?php     
    }else{
?>
    <tr>
        <td colspan="6">Empty Cart! LET'S SHOPPING!</td>
    </tr>
    </table>  
<?php        
    }
?>
<div class="controllbut">
    <form action="pages/buy.php?xoatatca=1" method="POST">
             <input name="xoatatca" type="submit" class="but" value="Delete All">

    </form>
    <form action="pages/thanhtoan.php" method="POST">
             <input name="dathang" type="submit" class="but" value="Order">
    </form>
    <a href="index.php" class="homebutton">Home</a>
</div>
</div>