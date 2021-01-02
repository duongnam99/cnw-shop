 <?php
    session_start();

    include("lib_db.php");
    
    if (isset($_POST["submit_login"])) {
		// lấy thông tin người dùng
		$username = $_POST["username"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
        $password = addslashes($password);
        
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
            $sql = "select * from users where username = '$username' and password = '$password' ";
            $user = select_one($sql);
            // var_dump($user);
			if ($user == null) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['username'] = $username;
                if($user["role"] == 0){
					echo "bạn không có quyền admin";

					// header('Location: trangchu.php');
				}else{
					header('Location: admin.php');
				}
			}
		}
	}
    
?>
