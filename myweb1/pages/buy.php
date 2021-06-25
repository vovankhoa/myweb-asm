<?php
    session_start();
    include('../admincp/config/config.php');
    //them so luong
    if(isset($_SESSION['buy']) && $_GET['cong']){
        $id=$_GET['cong'];
        foreach($_SESSION['buy'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('id'=>$cart_item['id'],'tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
            }else{
                $product[]=array('id'=>$cart_item['id'],'tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$cart_item['soluong']+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
            }
            $_SESSION['cart']=$product;
        }
        header("location:../../index.php?quanly=giohang");
    }
    //tru so luong
    if(isset($_SESSION['buy']) && $_GET['tru']){
        $id=$_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('id'=>$cart_item['id'],'tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
            }elseif($cart_item['soluong']>1){
                $product[]=array('id'=>$cart_item['id'],'tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$cart_item['soluong']-1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
            }
            $_SESSION['cart']=$product;
        }
        header("location:../../index.php?quanly=giohang");
    }
    //xoasanpham
    if(isset($_SESSION['cart'])&& $_GET['xoa']){
        $id=$_GET['xoa'];
            foreach($_SESSION['cart'] as $cart_item){
                if($cart_item['id']!=$id){
                    $product[]=array('id'=>$cart_item['id'],'tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
                }
                $_SESSION['cart']=$product;
            }
        header("location:../../index.php?quanly=giohang");
    }
    //xoatatca
    if(isset($_GET['xoatatca'])&& $_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header("location:../index.php?quanly=giohang");
    }
    //them sanpham
    if(isset($_POST['themgiohang'])){
        $id=$_GET['idproduct'];
        $soluong=1;
        $sql="SELECT*FROM tb_product WHERE PID='".$id."' LIMIT 1 ";
        $query=pg_query($mysql,$sql);
        $row=pg_fetch_array($query);
        if($row){
            $new_product=array(array('id'=>$id,'PName'=>$row['PName'],'Unit'=>$soluong,'Price'=>$row['Price'],'Picture'=>$row['Picture']));
            if(isset($_SESSION['cart'])){
                $found=false;
                foreach($_SESSION['cart'] as $cart_item){
                    if($cart_item['id']==$id){   
                        $product[]=array('id'=>$cart_item['id'],'PName'=>$cart_item['PName'],'Unit'=>$cart_item['Unit'] +1,'Price'=>$cart_item['Price'],'Picture'=>$cart_item['Picture']);
                        $found=true;
                    }else{                       
                        $product[]=array('id'=>$cart_item['id'],'PName'=>$cart_item['PName'],'Unit'=>$cart_item['Unit'],'Price'=>$cart_item['Price'],'Picture'=>$cart_item['Picture']);
                    }
                }
                if($found==false){
                    $_SESSION['cart']=array_merge($product,$new_product);
                }else{
                    $_SESSION['cart']=$product;
                }
            }else{
                $_SESSION['cart']=$new_product;
            }
        }
        header("location:../index.php?quanly=giohang");
    }
?>








