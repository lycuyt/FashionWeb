<?php 
    session_start();

    if(!isset($_SESSION['mySession'])){
       
        header('location: login.php');
    }
    

?>
<?php 
    include "database.php";
?>
<?php
    include "./class/cartegory_class.php";
    include "./class/brand_class.php";
    include "./class/product_class.php";
    include "./class/order_class.php";
    include "./class/review_class.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Admin</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <a href="../home.php" style="text-decoration: none;">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">Fashion</div>
            </a>
            
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Trang chủ</a>
                <a href="category.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Danh mục</a>
                <a href="brand.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Loại sản phẩm</a>
                <a href="product.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Sản phẩm</a>
                <a href="reviews.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Đánh giá</a>
                <a href="order.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Đơn hàng</a>
               
                <a href="analytics.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Thống kê</a>
                
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Trang chủ</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img style="border-radius: 50%;" width="40"  src="uploads/<?php echo $_SESSION['mySession']; ?>.png" alt="">
                                <?php echo $_SESSION['mySession'] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php 
                                $ca = new Cartegory;
                                $r1 = $ca->count_category();
                                 ?>
                                <h3 class="fs-2"><?php echo $r1 ?></h3>
                                <p class="fs-5">Danh mục</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php 
                                    $pro = new Product;
                                    $r2 = $pro ->count_product();
                                ?>
                                <h3 class="fs-2"><?php echo $r2 ?></h3>
                                <p class="fs-5">Sản phẩm</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php 
                                    $o = new Order;
                                    $r3 = $o ->count_order();
                                ?>
                                <h3 class="fs-2"><?php echo $r3 ?></h3>
                                <p class="fs-5">Đơn hàng</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
                                    $re = new Review;
                                    $r4 = $re -> count_pr();
                                ?>
                                <h3 class="fs-2">%<?php echo $r4 ?></h3>
                                <p class="fs-5">Đánh giá trên 4 sao</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col">
                    <h3 class="fs-4 mb-3">Tóm 3 sản phẩm bán chạy nhất</h3>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Đã bán</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $show_pro = $pro->show_product_sold();
                                if($show_pro)
                                {
                                    $i=0;
                                    while($result = $show_pro ->fetch_assoc()){
                                        $i++;
                                ?>
                                
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><span><img width="50" src="uploads/<?php echo $result['product_img']; ?>" alt=""></span></td>
                                    <td><?php echo $result['product_name'] ?></td>
                                    <td><?php echo $result['quantity_sold'] ?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                    <h3 class="fs-4 mb-3">Tóm 3 sản phẩm có doanh thu cao nhất</h3>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $show_pro = $pro->show_product_sold_1();
                                if($show_pro)
                                {
                                    $i=0;
                                    while($result = $show_pro ->fetch_assoc()){
                                        $i++;
                                ?>
                                
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><span><img width="50" src="uploads/<?php echo $result['product_img']; ?>" alt=""></span></td>
                                    <td><?php echo $result['product_name'] ?></td>
                                    <td><?php echo $result['total'] ?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>