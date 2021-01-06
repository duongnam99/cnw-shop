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

        $sql_cate = 'select * from categories';
        $cates = select_list($sql_cate);

        if (isset($_POST["submit_create_prd"])) {

            $target_dir = "./images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

            $name = $_POST["prd_name"];
            $amount = $_POST["amount"];
            $price = $_POST["price"];
            $discount = $_POST["discount"];
            $cate = $_POST["cate"];
            $image = $target_file;
            
            $sql = "insert into products (image, name, amount, price, discount, cate_id) values ('$image', '$name', '$amount', '$price', '$discount', '$cate') ";
            // var_dump($sql);
            $result = exec_update($sql);
            
            if($result){
                echo "Thêm sản phẩm thành công";
                header('Refresh: 2; URL=/cnw-ngocboi/admin.php');
            }
        }
    ?>

    <div class="main-page page_admin page_update_product">
        <div class="main-content">
            <div class="container">
                <div class="col-4">
                    <h3>Thêm sản phẩm</h3>
                    
                    <h4>Ảnh</h4>
                    <form action="them-san-pham.php" method="post" enctype="multipart/form-data">
                        <div class="thumb">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <img style="max-width: 150px;" src="" alt="">
                        </div>
                    
                        <div class="name feild_info">
                            <label for="prd_name">Tên sản phẩm</label>
                            <input type="text" name="prd_name" value="">
                        </div>
                        <div class="amount feild_info">
                            <label for="amount">Số lượng</label>
                            <input type="number" name="amount" value="">
                        </div>
                        <div class="price feild_info">
                            <label for="price">Giá</label>
                            <input type="number" name="price" value="">
                        </div>
                        <div class="discount feild_info">
                            <label for="discount">Giảm giá: (%) </label>
                            <input type="number" name="discount" value="">
                        </div>
                        <div class="cate feild_info">
                            <label for="cate">Loại sản phẩm: </label>
                            <select name="cate" id="">
                                <?php foreach($cates as $cate) { ?>
                                    <option value="<?php echo $cate['id']; ?>"><?php echo $cate['name']; ?></option>
                                <?php }?>
                            </select>
                        </div>
                       
                       <div class="action">
                            <button type="submit" name="submit_create_prd" class="">Thêm</button>
                        </div>
                    </form>
             
                </div>
            </div>
        </div>
    </div>
    


    <script src="js/main.js"></script>
</body>

</html>