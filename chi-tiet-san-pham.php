<?php
    session_start();
    include("lib_db.php");

    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;
    $sql_product = "select * from products where id='$id'";
    $product = select_one($sql_product);

    $sql_similar_products = "select * from products where cate_id={$product['cate_id']} limit 4";
    $similar_products = select_list($sql_similar_products);
    // var_dump($similar_products);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết sản phẩm</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style_bb.css">

</head>

<body>
    <header>
        <div class="container d-flex">
            <div class="logo-header">
                <img src="images/logo.png" alt="">
            </div>
            <div class="main-header">
                <!-- <div class="wrap-right"> -->
                <div class="menu">
                    <ul class="list_cate_1">
                        <a href="">
                            <li>Trang chủ</li>
                        </a>
                        <li class="has_child"> <span>Sản phẩm</span>
                            <div class="sub_menu">
                                <div class="container" style="display: flex;">
                                    <div class="cate-col">
                                        <h4 class="cate_2">Áo</h4>
                                        <ul class="list_cate_2">
                                            <li><a href="">Sản phẩm mới</a></li>
                                            <li><a href="">Áo sơ mi</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            </a>
                                    </div>
                                    <div class="cate-col">
                                        <h4 class="cate_2">Váy</h4>
                                        <ul class="list_cate_2">
                                            <li><a href="">Sản phẩm mới</a></li>
                                            <li><a href="">Áo sơ mi</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            </a>
                                    </div>
                                    <div class="cate-col">
                                        <h4 class="cate_2">Chân váy</h4>
                                        <ul class="list_cate_2">
                                            <li><a href="">Sản phẩm mới</a></li>
                                            <li><a href="">Áo sơ mi</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            </a>
                                    </div>
                                    <div class="cate-col">
                                        <h4 class="cate_2">Quần</h4>
                                        <ul class="list_cate_2">
                                            <li><a href="">Sản phẩm mới</a></li>
                                            <li><a href="">Áo sơ mi</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            </a>
                                    </div>
                                    <div class="cate-col">
                                        <h4 class="cate_2">Phụ kiện</h4>
                                        <ul class="list_cate_2">
                                            <li><a href="">Sản phẩm mới</a></li>
                                            <li><a href="">Áo sơ mi</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            <li><a href="">Áo măng tô</a></li>
                                            </a>
                                    </div>
                                </div>
                            </div>

                        </li>
                        <a href="">
                            <li>New</li>
                        </a>
                        <a href="">
                            <li>Sale</li>
                        </a>
                        <a href="">
                            <li>Cửa hàng</li>
                        </a>
                </div>
                <!-- </div> -->
                <div class="search">
                    <label for=""></label>
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                        placeholder="Tìm kiếm">
                </div>
                <div class="more">
                    <i class="fa fa-user"></i>
                    <i class="fa fa-shopping-cart"></i>
                </div>
            </div>
        </div>
        </div>
    </header>

    <div class="page-product-details">
        <div class="container">
            <div class="product-details">
                <div class="wrap-left">
                    <img src="<?php echo $product['image'] ?>" alt="">
                </div>
                <div class="wrap-right">
                    <h4><?php echo $product['name'] ?></h4>
                    <p> Giá: <span><?php echo $product['price'] ?></span> </p>
                    <label for>Số lượng: </label>
                    <input type="number">
                    <div class="action">
                        <button class="buy-now">Mua ngay</button>
                        <button>Thêm vào giỏ hàng</button>
                    </div>
                </div>
            </div>
            <div class="product-list">
                <div class="category">
                    <div class="container">
                        <h3 class="cate-title">Sản phẩm tương tự</h3>
                        <div class="cate-items">
                                <?php foreach ($similar_products as $i => $product) { ?>
                                    <div class="item item-product">
                                        <a href="chi-tiet-san-pham.php?id=<?php echo $product['id']; ?>" class="item-img">
                                            <img src="<?php echo $product['image']; ?>" alt="">
                                        </a>
                                        <div class="content">
                                            <div class="wrap-name-price">
                                                <a href="chi-tiet-san-pham.php?id=<?php echo $product['id']; ?>" class="name"><?php echo $product['name'] ?></a>
                                                <div class="new-price"><?php
                                                    if ($product['discount'] != null)
                                                        echo $product['price'] * (100 - $product['discount']) / 100;
                                                    ?> ₫</div>
                                                <div class="old-price"><?php echo $product['price']; ?> ₫</div>
                                            </div>
                                            <div class="like"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                       
                    </div>
        
                </div>
            </div>
        </div>
    </div> 

    <footer>
        <div class="container d-flex">
            <div class="ft-info">
                <div class="logo">
                    <img src="images/logo.png" alt="">
                </div>
            </div>
            <div class="ft-info">
                <h3 class="type">Về chúng tôi</h3>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm </a></li>
                    <li><a href="#">New</a></li>
                    <li><a href="#">Best seller</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Cửa hàng </a></li>
                </ul>
            </div>
            <div class="ft-info">
                <h3 class="type">Chính sách</h3>
                <ul>
                    <li><a href="/chinh-sach-mua-hang">Chính sách mua hàng</a></li>
                    <li><a href="#">Chính sách bảo hành</a></li>
                    <li><a href="/huong-dan-thanh-toan">Mua hàng thanh toán online</a></li>
                    <li><a href="/quy-dinh-doi-tra">Chính sách đổi trả</a></li>
                    <li><a href="#">Chính sách hoàn tiền</a></li>
                </ul>
            </div>
            <div class="ft-info">
                <h3 class="type">Trợ giúp</h3>
                <ul>
                    <li><a href="/faq">FAQ</a></li>
                    <li><a href="/chinh-sach-van-chuyen">Vận chuyển </a></li>
                    <li><a href="/lien-he">Liên hệ</a></li>
                    <li><a href="/voucher">Mã voucher</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="js/main.js"></script>

</body>