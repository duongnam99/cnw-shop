<?php
session_start();
    require_once('lib_db.php');
    require_once('lib_auth.php');
    if (!is_admin()) {
        header('Location: dangnhap-admin.php');
    }

    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;

    $sql_cate = "select * from categories where id='$id'";
    $cate = select_one($sql_cate);

    $sql_delete_cate = "delete from categories where id={$id}";
    $rs_cate = exec_update($sql_delete_cate);

    $rs_child_cate = true;
    if ($cate['parent_id'] == null) {
        $sql_delete_child_cate = "delete from categories where parent_id={$id}";
        $rs_child_cate = exec_update($sql_delete_child_cate);
    }

    if ($rs_cate && $rs_child_cate) {
        echo "Xóa category thành công";

        header('Refresh: 2; URL=/cnw-ngocboi/admin-cate.php');
    } else {
        echo "Xóa category thất bại";
    }

?>