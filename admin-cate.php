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
        $sql_cates = "select * from categories where parent_id is null";
    
        $cates = select_list($sql_cates);
        foreach($cates as $key => $cate){
            $sql_child_cates = "select * from categories where parent_id={$cate['id']}";
            $child_cates = select_list($sql_child_cates);
            $cates[$key]['childs'] = $child_cates;
        }

    ?>

    <div class="main-page page_admin">
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3>Danh sách category</h3>
                        <a href="them-cate.php">Thêm category</a>

                        <ul>
                            <?php foreach($cates as $key => $cate){ ?>
                                <li><?php echo $cate["name"]; ?> - <a href="sua-cate.php?id=<?php echo $cate['id'] ?>">Sửa | </a><a href="xoa-cate.php?id=<?php echo $cate['id']; ?>" onclick="return confirm('Xóa cate cha sẽ xóa cả cate con!')"> Xóa</a>
                                    <ul>
                                        <?php foreach($cate['childs'] as $i => $cate_child){ ?>
                                            <li><?php echo $cate_child["name"]; ?> - <a href="sua-cate.php?id=<?php echo $cate_child['id'] ?>">Sửa |</a><a href="xoa-cate.php?id=<?php echo $cate_child['id']; ?>"> Xóa</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>

            </div>
           
        </div>
    </div>
    


    <script src="js/main.js"></script>
</body>

</html>