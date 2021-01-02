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

        $sql_products = "select * from products";
        $products = select_list($sql_products);


    ?>

    <div class="main-page page_product_cart page_admin">
        <div class="main-content">
            <div class="container">
                <div class="row cart">
                    <div class="col-12">
                        <h3>Danh sách sản phẩm</h3>
                        <a href="them-san-pham.php">Thêm sản phẩm</a>
                        <div class="list-product">
                  
                            <div class="prd prd-head">
                                <h4 class="pred-des-title">Sản phẩm</h4>
                                <h4>Số lượng</h4>
                                <h4>Giá</h4>
                                <h4>Giảm giá</h4>
                                <h4>Thao tác</h4>
                            </div>
                            <?php foreach( $products as $key => $product) { ?>
                            <div class="prd">
                                <div class="prd-des">
                                    <div class="thumb">
                                        <img src="<?php echo $product['image']; ?>" alt="">
                                    </div>
                                    <h5 class="name"><?php echo $product['name']; ?></h5>
                                </div>
                                <div class="amount">
                                 
                                    <span><?php echo $product['amount']; ?></span>
                                </div>
                                <div class="price">
                                    <span><?php echo $product['price']; ?></span>
                                </div>
                                <div class="discount">
                                    <span><?php echo $product['discount']; ?> %</span>
                                </div>
                                <div>
                                    <a target="_blanks" href="sua-san-pham.php?id=<?php echo $product['id']; ?>">Sửa</a>
                                    <a href="xoa-san-pham.php?id=<?php echo $product['id']; ?>">Xóa</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <!-- <div class="action">
                            <button class="buy-now">Thanh toán</button>
                            <button>Tiếp tục mua sắm</button>
                        </div> -->
                    </div>
                </div>

            </div>
           
        </div>
    </div>
    


    <script src="js/main.js"></script>
</body>

</html>