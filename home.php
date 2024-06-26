<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuytcuyt Home</title>
    <!-- font awesome cnd -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- boostrap css-->
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="style_home.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="home.php">
                <img src="./img/logo1.png" alt="site icon">
            </a>

            <div class="order-lg-2 nav-btns">

                <button type="button" class="btn position-relative">
                    <input type="text" class="form-control" placeholder="Tìm kiếm" style="border-radius: 20px;">

                    <button class="btn " type="submit"><i class="fa fa-search"></i></button>

                    <!-- <i class="fa fa-search"></i> -->
                </button>
                <button type="button" class="btn position-relative">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">5</span>
                </button>
                <button type="button" class="btn position-relative">
                    <i class="fa fa-heart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">2</span>
                </button>

            </div>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav ">
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#">Trang chủ</a>
                    </li>
                    <?php

                    include "./class/cartegory_class.php";
                    include "./database.php";
                    include "./class/brand_class.php";
                    $brand = new Brand;
                    $cartegory = new Cartegory;
                    $show_cartegory = $cartegory->show_cartegory();
                    if ($show_cartegory) {

                        while ($result = $show_cartegory->fetch_assoc()) {

                    ?>
                            <li class="nav-item px-2 py-2">
                                <a class="nav-link text-uppercase text-dark" href="cartegory.php?cartegory_name=<?php echo $result['cartegory_name']; ?>"><?php echo $result['cartegory_name']; ?></a>
                                <ul class="sub-menu" style="list-style-type: none;">
                                    <?php

                                    $name = $result['cartegory_name'];
                                    $show_brand = $brand->show_brand1($name);
                                    if ($show_brand) {
                                        while ($resultA = $show_brand->fetch_assoc()) {
                                    ?>
                                            <li><a href=""><?php echo $resultA['brand_name']; ?></a></li>
                                            <!-- <li><a href="">Collections</a></li>
                            <li><a href="">Áo</a> </li>
                            <li><a href="">Quần</a></li> -->
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                    <?php
                        }
                    }
                    ?>  
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#">Về chúng tôi</a>
                    </li>
                    <li class="nav-item px-2 py-2 border-0">
                        <a class="nav-link text-uppercase text-dark" href="#">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- header -->
    <header id="header" style="padding-top: 100px;">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="cartegory.html">
                        <img src="./img/slide1.jpg" class="d-block w-100 ctborder" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <img src="./img/slide2.jpg" class="d-block w-100 ctborder" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/slide3.jpg" class="d-block w-100 ctborder" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/slide4.jpg" class="d-block w-100 ctborder" alt="...">
                </div>
            </div>
        </div>

    </header>
    <!-- end-header -->
    <!-- categoryList -->
    <div class="container py-5">
        <div class="title text-center">
            <h2 class="position-relative d-inline-block">DANH MỤC NỔI BẬT</h2>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">

            <div class="col">
                <div class="card">
                    <img src="./img/nu.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">NỮ</h5>
                        <?php $name = "NỮ"; ?>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                            dignissimos accusantium amet similique velit iste.</p>
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        <!-- <button class="btn btn-primary" onclick="toCategory($name)">Xem thêm</button> -->
                        <button class="btn btn-primary" onclick="redirectToCategory('<?php echo $name; ?>')">Xem thêm</button>

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="./img/nam.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">NAM</h5>
                        <?php $name = "NAM" ?>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                            dignissimos accusantium amet similique velit iste.</p>
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                    <button class="btn btn-primary" onclick="redirectToCategory('<?php echo $name; ?>')">Xem thêm</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="./img/treem.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">TRẺ EM</h5>
                        <?php $name = "TRẺ EM"?>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                            dignissimos accusantium amet similique velit iste.</p>
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        <button class="btn btn-primary" onclick="redirectToCategory('<?php echo $name; ?>')">Xem thêm</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end category list -->
    <!-- collection -->
    <section id="collection" class="py-5">
        <div class="container">
            <div class="title text-center">
                <h2 class="position-relative d-inline-block">SẢN PHẨM MỚI</h2>
            </div>

            <div class="row g-0">
                <div class="d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                    <button type="button" class="btn m-2 text-dark active-filter-btn" data-filter="*">Tất cả</button>
                    <button type="button" class="btn m-2 text-dark" data-filter=".nam">Nam</button>
                    <button type="button" class="btn m-2 text-dark" data-filter=".nu">Nữ</button>
                    <button type="button" class="btn m-2 text-dark" data-filter=".treem">Trẻ em</button>
                </div>

                <div class="collection-list mt-4 row gx-0 gy-3">
                    <?php
                    include "./class/product_class.php";
                    $product = new Product;
                    $cartegory_name = "NAM";
                    $show_product = $product->show_product1($cartegory_name);
                    if ($show_product) {
                        while ($result = $show_product->fetch_assoc()) {


                    ?>
                            <div class="col-md-6 col-lg-4 col-xl-3 p-2 nam">
                                <div class="collection-img position-relative">
                                    <img src="./admin/uploads/<?php echo $result['product_img']; ?>" class="w-100 ctborder">
                                    <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                                </div>
                                <div class="text-center">
                                    <div class="rating mt-3">
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                    </div>
                                    <p class="text-capitalize my-1"><?php echo $result['product_name'] ?></p>
                                    <span class="fw-bold">$ <?php echo $result['product_price'] ?></span>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <?php
                    // include "./class/product_class.php";
                    $product1 = new Product;
                    $cartegory_name = "NỮ";
                    $show_product = $product1->show_product1($cartegory_name);
                    if ($show_product) {
                        while ($result = $show_product->fetch_assoc()) {


                    ?>
                            <div class="col-md-6 col-lg-4 col-xl-3 p-2 nu">
                                <div class="collection-img position-relative">
                                    <img src="./admin/uploads/<?php echo $result['product_img']; ?>" class="w-100 ctborder">
                                    <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                                </div>
                                <div class="text-center">
                                    <div class="rating mt-3">
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                    </div>
                                    <p class="text-capitalize my-1"><?php echo $result['product_name'] ?></p>
                                    <span class="fw-bold">$ <?php echo $result['product_price'] ?></span>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <?php
                    // include "./class/product_class.php"; 
                    $product2 = new Product;
                    $cartegory_name = "TRẺ EM";
                    $show_product = $product2->show_product1($cartegory_name);
                    if ($show_product) {
                        while ($result = $show_product->fetch_assoc()) {


                    ?>
                            <div class="col-md-6 col-lg-4 col-xl-3 p-2 treem">
                                <div class="collection-img position-relative">
                                    <img src="./admin/uploads/<?php echo $result['product_img']; ?>" class="w-100 ctborder">
                                    <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                                </div>
                                <div class="text-center">
                                    <div class="rating mt-3">
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                        <span class="text-primary"><i class="fa-solid fa-star" style="color: #f78f9a;"></i></span>
                                    </div>
                                    <p class="text-capitalize my-1"><?php echo $result['product_name'] ?></p>
                                    <span class="fw-bold">$ <?php echo $result['product_price'] ?></span>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- end of collection -->

    <!-- special products -->
    <section id="special" class="py-5">
        <div class="container">
            <div class="title text-center py-5">
                <h2 class="position-relative d-inline-block">ĐÓN HÈ RẠNG RỠ - SĂN SALE THẢ GA - CHỈ CÓ TẠI ONLINE</h2>
            </div>

            <div class="special-list row g-0">
                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao1.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>
                        <a href="#" class="btn btn-primary mt-3">Thêm vào giỏ hàng</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao2.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>
                        <a href="#" class="btn btn-primary mt-3">Thêm vào giỏ hàng</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao3.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>
                        <a href="#" class="btn btn-primary mt-3">Thêm vào giỏ hàng</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao4.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>
                        <a href="#" class="btn btn-primary mt-3">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex align-items-center justify-content-center text-primary ">
            <a href="#" class="btn btn-primary mt-3">Xem thêm</a>
        </div>

    </section>

    <!-- blogs -->
    <section id="offers">
        <div class="container">
            <div class="row">
                <a href="cartegory.html">
                    <img src="./img/bl3.png" class="d-block w-100 ctborder" alt="...">
                </a>
            </div>
            <div class="row py-2">
                <div class="col">
                    <a href="cartegory.html">
                        <img src="./img/bl1.png" class="d-block w-100 ctborder" alt="...">
                    </a>
                </div>
                <div class="col ">
                    <a href="cartegory.html">
                        <img src="./img/sl2.png" class="d-block w-100 ctborder" alt="...">
                    </a>
                </div>
            </div>

        </div>
    </section>
    <section id="special" class="py-5">
        <div class="container">
            <div class="title text-center py-5">
                <h2 class="position-relative d-inline-block">TOP BÁN CHẠY</h2>
            </div>

            <div class="special-list row g-0">
                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao1.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao2.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao3.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao4.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao4.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao4.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao4.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="./img/ao4.jpg" class="w-100 ctborder">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart" style="color: #f78f9a;"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                        <span class="fw-bold d-block">$ 45.50</span>

                    </div>
                </div>
            </div>
        </div>

        <div class="container d-flex align-items-center justify-content-center text-primary ">
            <a href="#" class="btn btn-primary mt-3">Xem thêm</a>
        </div>

    </section>
    <!-- about us -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row gy-lg-5 align-items-center">
                <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class="title pt-3 pb-5">
                        <h2 class="position-relative d-inline-block ms-4">VỀ CHÚNG TÔI</h2>
                    </div>
                    <p class="lead text-muted">Chúng tôi thành lập năm 2024, mang xu hướng thời trang mới </p>
                    <p>Hãy đến với chúng tôi và cùng tận hưởng những sản phẩm tuyệt vời, chúng tôi cam kết về chất lượng sản phẩm cũng như trải nghiệm tốt nhất cho bạn.</p>
                </div>
                <div class="col-lg-6 order-lg-0">
                    <img src="./img/gt1.png" alt="" class="img-fluid ctborder">
                </div>
            </div>
        </div>
    </section>
    <!-- end of about us -->


    <!-- newsletter -->
    <section id="newsletter" class="py-5">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div class="title text-center pt-3 pb-5">
                    <h2 class="position-relative d-inline-block ms-4">ĐĂNG KÝ NGAY</h2>
                </div>

                <p class="text-center text-muted">Nhận thông tin các chương trình của IVY moda</p>
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Nhập email của bạn ...">
                    <button class="btn btn-primary" type="submit">Gửi đi</button>
                </div>
            </div>
        </div>
    </section>
    <!-- end of newsletter -->
    <!-- gallery -->
    <div class="container">
        <div class="title text-center pt-3 pb-5">
            <h2 class="position-relative d-inline-block ms-4">GALLERY</h2>
        </div>
        <div class="slider-wrapper">
            <button id="prev-slide" class="slide-button material-symbols-rounded">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <ul class="image-list">
                <img class="image-item" src="./img/gl1.jpg" alt="img-1" />
                <img class="image-item" src="./img/gl2.jpg" alt="img-2" />
                <img class="image-item" src="./img/gl3.jpg" alt="img-3" />
                <img class="image-item" src="./img/gl4.jpg" alt="img-4" />
                <img class="image-item" src="./img/gl5.png" alt="img-5" />
                <img class="image-item" src="./img/gl6.png" alt="img-6" />
                <img class="image-item" src="./img/gl7.png" alt="img-7" />
                <img class="image-item" src="./img/gl8.png" alt="img-8" />
                <img class="image-item" src="./img/gl9.png" alt="img-9" />
                <img class="image-item" src="./img/gl10.png" alt="img-10" />
            </ul>
            <button id="next-slide" class="slide-button material-symbols-rounded">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        <div class="slider-scrollbar">
            <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
            </div>
        </div>
    </div>
    <!-- end gallery -->
    <!-- footer -->
    <footer class="bg-dark py-5">
        <div class="container">
            <div class="row text-white g-4">
                <div class="col-md-6 col-lg-3">
                    <a class="text-uppercase text-decoration-none brand text-white" href="home.html">Cuytcuyt</a>
                    <p class="text-white text-muted mt-3">
                        Công ty cổ phần Cuytcuyt
                        Chúng tôi mang đến những sản phẩm tốt nhất với giá cả hợp lý
                    </p>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light">Danh mục</h5>
                    <ul class="list-unstyled">
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Trang chủ
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Nữ
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Nam
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Trẻ em
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Liên hệ với chúng tôi</h5>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-map-marked-alt"></i>
                        </span>
                        <span class="fw-light">
                            Ngõ 35, Ngô Thì Sỹ, Vạn Phúc, Hà Đông
                        </span>
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="fw-light">
                            lycuyt@gmail.com
                        </span>
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <span class="fw-light">
                            +9786 6776 236
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Theo dõi chúng tôi</h5>
                    <div>
                        <ul class="list-unstyled d-flex">
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v19.0" nonce="yxoYsY8K"></script>
                        <div class="fb-page" data-href="https://www.facebook.com/thoitrangivymoda" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/thoitrangivymoda" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thoitrangivymoda">IVY moda</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.
        372394250898!2d105.77531897471303!3d20.977704489531256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134532dbed14dcb%3A0x
        55bbcd202dbb3347!2zMjAgTmcuIDM1IFAuIE5nw7QgVGjDrCBT4bu5LCBW4bqhbiBQaMO6YywgSMOgIMSQw7RuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1sv
        i!2s!4v1713280437326!5m2!1svi!2s" width=100% height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </footer>
    <!-- end of footer -->
    <!-- backtop -->
    <div id="backtop">
        <i class="fa-solid fa-chevron-up"></i>
    </div>


    <!-- jquery -->
    <script src="./js/jquery-3.7.1.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- boostrap js -->
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="./js/script.js"></script>

</body>

</html>