<?php
    include("admincp/config/config.php");
$id=$_GET['idproduct'];
    $sql="SELECT*FROM tb_product Where PID='".$id."' ";
    $sql_query=pg_query($mysql,$sql);
    $row_sanpham=pg_fetch_array($sql_query);
?>
<p><?php echo $row_sanpham['thongsokt'] ?></p>