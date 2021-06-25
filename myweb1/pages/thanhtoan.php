<?php
    session_start();
    include('../admincp/config/config.php');
	if(isset($_SESSION['dangnhap'])){
        if(isset($_SESSION['cart'])){
            
            $id_khachhang = $_SESSION['id_user'];
            $code_order = rand(0,9999);
            $insert_cart = "INSERT INTO tb_cart (id_admin,code_cart,cart_status) VALUE('".$id_khachhang."','".$code_order."',1)";
            $cart_query = pg_query($mysqli,$insert_cart);
            if($cart_query){
                //them gio hang chi tiet
                foreach($_SESSION['cart'] as $key => $value){
                    $id_sanpham = $value['id'];
                    $soluong = $value['Unit'];
                    $insert_order_details = "INSERT INTO tb_detail(PID,amount,code_cart) VALUE('".$id_sanpham."','".$soluong."','".$code_order."')";
                    pg_query($mysqli,$insert_order_details);
                }
            }
            unset($_SESSION['cart']);
            header('Location:../index.php?quanly=giohang');
        }else{
            echo "The Cart is Empty!";  
        }
    }else{
        echo "Plese Login or Signup First";
    }
?>