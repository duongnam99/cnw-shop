<?php
    require_once("lib_db.php");
    function is_admin(){
        if($_SESSION['username']){
            $username = $_SESSION['username'];
            $sql = "select * from users where username='$username' and role=1";
            $user = select_one($sql);
            if($user != null){
                return true;
            }
        }
        return false;
    }

?>