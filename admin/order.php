<?php
include "header.php";
include "class/order_class.php";
?>
<?php
$orders = new Order;
$show_orders = $orders->show_orders();
?>
<?php include "slider.php" ?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Đơn hàng</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img style="border-radius: 50%;" width="40" src="uploads/<?php echo $_SESSION['mySession']; ?>.png" alt="">
                        <?php echo $_SESSION['mySession'] ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid px-4">

        <div class="row g-3 my-2">
            <div class="col">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                    <?php
                            $count = $orders->count_order(); 
                        ?>
                        <h3 class="fs-2"><?php echo $count ?></h3>
                        <p class="fs-5">Đơn hàng</p>
                    </div>
                    <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

        </div>
        <div class="row my-5">
            <div class="col-md-3">
                <h3 class="fs-4 mb-3">Đơn hàng</h3>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-10 ">
                        <form action="category_se.php" method="post">
                            <div class="input-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Tìm kiếm..." autocomplete="off" required>
                                <div class="input-group-append">
                                    <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-info " style="background-color: #ef8fa2; border-color: #ef8fa2;">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5" style="position: relative;">
                        <div class="list-group" id="show-list" style="position: absolute; z-index: 1; width:500px">
                            <!-- Here autocomplete list will be display -->
                        </div>
                    </div>

                </div>

            </div>
            

        </div>
        <?php

        ?>
        <div class="row my-5">


            <div class="col">
                <table class="table bg-white rounded shadow-sm  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="100">#</th>
                            <th scope="col">Mã</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Thời gian</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($show_orders) {
                            $i = 0;
                            while ($result = $show_orders->fetch_assoc()) {
                                $i++;

                        ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['oder_id']; ?></td>
                                    <td><?php echo $result['customer']; ?></td>
                                    <td><?php echo $result['address']; ?></td>
                                    <td><?php echo $result['time']; ?></td>
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
<?php include "footer.php" ?>