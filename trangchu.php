<?php
    session_start();
    include("lib_db.php");
    $sql_products = "select * from products";
    $sql_cates = "select * from categories where parent_id is null";
    
    $products = select_list($sql_products);
    $cates = select_list($sql_cates);
    foreach($cates as $key => $cate){
        $sql_child_cates = "select * from categories where parent_id={$cate['id']}";
        $child_cates = select_list($sql_child_cates);
        $cates[$key]['childs'] = $child_cates;

        $demo_parent_cate = [];
        foreach($child_cates as $i => $child_cate){
            $sql_products_cate = "select * from products where cate_id={$child_cate['id']} limit 4";
            $products_cate = select_list($sql_products_cate);
            
            $demo_parent_cate = array_merge($demo_parent_cate, $products_cate);
            if(count($demo_parent_cate) > 4){
                break;
            }


        }

        $cates[$key]['demo'] = $demo_parent_cate;
    }
    
    
?>

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

    <header>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="logo">
                        <img src="images/logo.png" alt="">
                    </div>
                </div>
                <div class="col-10 main-header">
                    <div class="menu-desktop">
                        <ul class="cate_1">
                            <a href=""><li>Trang chủ</li></a>
                            <li class="has_child"> <span>Sản phẩm</span>
                                <div class="sub_menu">
                                    <div class="container">
                                        <div class="row">
                                            <?php foreach($cates as $key => $cate){ ?>

                                                    <div style="flex: 1">
                                                        <h4 class="cate_2"><?php echo $cate["name"]; ?></h4>
                                                        <ul class="list_cate_2">
                                                        <?php foreach($cate["childs"] as $i => $cate_child){ ?>
                                                            <li><a href=""><?php echo $cate_child["name"]; ?></a></li>
                                                        <?php } ?>
                                                        </ul>

                                                    </div>

                                            <?php } ?>


                                        </div>
                                    </div>
                                </div>
                            
                            </li>
                            <a href=""><li>New</li></a>
                            <a href=""><li>Sale</li></a>
                            <a href=""><li>Cửa hàng</li></a>
                    </div>
                    <div class="search">
                        <label for=""></label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Tìm kiếm">
                    </div>
                    <div class="more">
                        <?php if (isset($_SESSION['username'])) { ?>
                            <div>
                                <span><?php echo ($_SESSION['username']); ?></span>
                                <span class="logout"><a href="dangxuat.php">Đăng xuất</a></span>
                            </div>
                            <i class="fa fa-user"></i>
                                
                        <?php  }else{ ?>
                            <span class="toggle_login">Đăng nhập </span>
                            <span class="toggle_regis">Đăng ký</span>
                        <?php } ?> 
                        <i class="fa fa-shopping-cart"></i>
                
                    </div>
                
                </div>
            </div>
        </div>
    </header>
    
    <div class="main-page page_home">
        <div class="home-banner">
            <img src="./images/1440x610_1_.jpg" alt="">
        </div>

        <div class="main-content">
        <?php foreach($cates as $key => $cate){ 
            if(count($cate['demo']) > 0){
            ?>
            <section class="category <?php if($key%2 == 1) echo 'odd' ?>">
                <div class="container">
                <div class="cate-head">
                    <h4 class="cate-title"><?php echo $cate["name"]; ?></h4>
                </div>
                <div class="cate-items">
                    <?php foreach($cate['demo'] as $i => $product){ ?>
                        <div class="item item-product">
                            <a href="chitietsanpham.html" class="thumb">
                                <img src="<?php echo $product['image']; ?>" alt="">
                            </a>
                            <div class="content">
                                <div class="wrap-name-price">
                                    <a href="" class="name"><?php echo $product['name'] ?></a>
                                    <div class="new-price"><?php 
                                        if($product['discount'] != null )
                                        echo $product['price']*(100-$product['discount'])/100;
                                    ?> ₫</div>
                                    <div class="old-price"><?php echo $product['price']; ?> ₫</div>
                                </div>
                                <div class="like"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    <?php } ?>
                
                </div>

                <button class="watch_more">
                    Xem thêm
                </button>
                </div>
            </section>

        <?php }
    
        } ?>
            <section class="category cate-sp">
                <div class="container">
                    <div class="cate-head">
                        <h4 class="cate-title">Gợi ý</h4>
                    </div>
                    <div class="cate-items">
                        <div class="wrap-left">
                            <?php foreach($products as $key => $product){ ?>
                                <div href class="item item-product">
                                    <a href="" class="thumb">
                                        <img src="<?php echo $product['image'] ?>" alt="">
                                    </a>
                                    <div class="content">
                                        <div class="wrap-name-price">
                                                <a href="" class="name"><?php echo $product['name'] ?></a>
                                                <div class="new-price"><?php 
                                                    if($product['discount'] != null )
                                                    echo $product['price']*(100-$product['discount'])/100;
                                                ?> ₫</div>
                                                <div class="old-price"><?php echo $product['price'] ?> ₫</div>
                                        </div>
                                        <div class="like"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                                
                            <?php 
                                if($key > 4) break;
                            } ?>
                        </div>
                        <div class="wrap-right">
                            <div href class="item item-product prd-sp">
                                <a href="" class="thumb">
                                        <img src="<?php echo $products[4]['image'] ?>" alt="">
                                    </a>
                                <div class="content">
                                    <div class="wrap-name-price">
                                            <a href="" class="name"><?php echo $products[4]['name'] ?></a>
                                            <div class="new-price"><?php 
                                                if($products[4]['discount'] != null )
                                                echo $products[4]['price']*(100-$products[4]['discount'])/100;
                                            ?> ₫</div>
                                            <div class="old-price"><?php echo $products[4]['price'] ?> ₫</div>
                                    </div>
                                    <div class="like"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
                                </div>
                        </div>
                    </div>
                           
                </div>
            
            </section>

            <section class="registry_member">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h2>Đăng ký thành viên Nhận ngay ưu đãi</h2>
                            <p class="mt-3">Chiết khấu lên tới 15% + hoàn tiền tới 3%.</p>
                            <button class="watch_more">
                                Xem thêm
                            </button>
                        </div>
                        <div class="col-6">
                            <div class="wrap-img">
                                <img src="images/banner1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>
           
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="logo">
                        <img src="images/logo.png" alt="">
                    </div>
                </div>
                <div class="col-3">
                    <h3 class="type">Về chúng tôi</h3>
                    <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm </a></li>
                    <li><a href="#">New</a></li>
                    <li><a href="#">Best seller</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Cửa hàng </a></li>
                    </ul>
                </div>
                <div class="col-3">
                    <h3 class="type">Chính sách</h3>
                    <ul>
                    <li><a href="/chinh-sach-mua-hang">Chính sách mua hàng</a></li>
                    <li><a href="#">Chính sách bảo hành</a></li>
                    <li><a href="/huong-dan-thanh-toan">Mua hàng thanh toán online</a></li>
                    <li><a href="/quy-dinh-doi-tra">Chính sách đổi trả</a></li>
                    <li><a href="#">Chính sách hoàn tiền</a></li>
                    </ul>
                </div>
                <div class="col-3">
                    <h3 class="type">Trợ giúp</h3>
                    <ul>
                    <li><a href="/faq">FAQ</a></li>
                    <li><a href="/chinh-sach-van-chuyen">Vận chuyển </a></li>
                    <li><a href="/lien-he">Liên hệ</a></li>
                    <li><a href="/voucher">Mã voucher</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class="model-login-regis" style="display: none;">
        <div class="model-body">
        <form class="form-login" action="dangnhap.php" method="post" style="display: none;">
          
          <div class="">
              <label for="uname"><b>Tên đăng nhập</b></label>
              <input type="text" placeholder="Enter Username" name="username" required>

              <label for="psw"><b>Mật khẩu</b></label>
              <input type="password" placeholder="Enter Password" name="password" required>

              <button type="submit" name="submit_login">Đăng nhập</button>
              <label>
        
          </div>
      
      </form>

      <form class="form-reg" action="dangky.php" method="post" style="display: none;">
        
          <div class="">

              
              <label for="uname"><b>Tên đăng nhập</b></label>
              <input type="text" placeholder="Enter Username" name="username" required>   

              <label for="psw"><b>Mật khẩu</b></label>
              <input type="password" placeholder="Enter Password" name="password" required>

              <label for="psw"><b>Nhập lại mật khẩu</b></label>
              <input type="password" placeholder="Enter Password" name="password_conf" required>

              <button type="submit" name="submit_regis">Đăng ký</button>
              <label>
         
          </div>

        
        </form>
        <div class="">
            <button type="button" class="cancelbtn">Hủy</button>
        </div>
        </div>
        
    </div>

    <script src="js/main.js"></script>
</body>

</html>