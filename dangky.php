<?php
    include("lib_db.php");
    session_start();

	if (isset($_POST["submit_regis"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
        $password = $_POST["password"];
        $password_conf = $_POST["password_conf"];
       
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($username == "" || $password == "" || $password_conf == "") {
			echo "bạn vui lòng nhập đầy đủ thông tin";
		}else{
            if($password_conf != $password){
                echo "Nhập lại mật khẩu không khớp";
            }else{
                // $data = [
                //     "username" => $username,
                //     "password" => $password,
                //     "role" => 0
                // ];
                $sql = "insert into users(username, password, role) values ( '$username', '$password', 0)";
                $result = exec_update($sql);
                $_SESSION['username'] = $username;
                // $result = data_to_sql_insert('users', $data);
                // var_dump($result);
                // mysqli_query($conn,$sql);    
                // echo "chúc mừng bạn đã đăng ký thành công";
                header('Location: trangchu.php');
            }
            
		}
	}

?>