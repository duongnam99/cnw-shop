<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ngoc Boi Shop</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php
        session_start();
        require_once('lib_db.php');
        require_once('lib_auth.php');
        if(!is_admin()){
            header('Location: dangnhap-admin.php');
        }

        $sql_cate = 'select * from categories where parent_id is null';
        $cates_parent = select_list($sql_cate);

        if (isset($_POST["submit_create_cate"])) {

            $name = $_POST["cate_name"];
            $parent_id = $_POST["cate_parent"];
            
            $sql = "insert into categories (name, parent_id) values ('$name', {$parent_id}) ";
            // var_dump($sql);
            $result = exec_update($sql);
            
            if($result){
                echo "Thêm category thành công";
                header('Refresh: 2; URL=/cnw-ngocboi/admin-cate.php');
            }
        }
    ?>

    <div class="main-page page_admin">
        <div class="main-content">
            <div class="container">
                <form action="them-cate.php" method="post" style="margin-top: 80px;">
                    <input type="text" name="cate_name" placeholder="Tên category">
                    <!-- <label for="">Loại category:</label>
                    <input type="checkbox" id="" name="" value="">
                    <label for="vehicle1"> Cấp 1</label><br>
                    <input type="checkbox" id="" name="" value="">
                    <label for="vehicle2"> Cấp 2</label><br> -->
                    <div style="margin-top: 15px;">
                        <label for="cate_parent">Category cha</label>
                        <select name="cate_parent" id="">
                            <option value="null">select</option>
                            <?php foreach($cates_parent as $cate_parent) { ?>
                                <option value="<?php echo $cate_parent['id']; ?>"><?php echo $cate_parent['name']; ?></option>
                            <?php }?>
                        </select>
                    </div>
               

                    <button type="submit"style="margin-top:15px;" name="submit_create_cate">Lưu</button>
                </form>
            </div>
        </div>
    </div>
    


    <script src="js/main.js"></script>
</body>

</html>