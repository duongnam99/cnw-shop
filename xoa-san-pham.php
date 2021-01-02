<?php
       session_start();
       require_once('lib_db.php');
       require_once('lib_auth.php');
       if(!is_admin()){
           header('Location: dangnhap-admin.php');
       }

       $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;
       $sql_product = "delete from products where id='$id'";
       $rs = exec_update($sql_product);
       
       if($rs){
           echo "Xóa sản phẩm thành công";

           header('Refresh: 2; URL=/cnw-boiboi/admin.php');

       }else{
            echo "Xóa sản phẩm thất bại";
       }
?>