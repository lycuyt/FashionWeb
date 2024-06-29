<?php
session_start();

if (!isset($_SESSION['mySession'])) {

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
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"></i>Fashion</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i class="fas fa-tachometer-alt me-2"></i>Trang chủ</a>
                <a href="category.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-project-diagram me-2"></i>Danh mục</a>
                <a href="brand.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-gift me-2"></i>Loại sản phẩm</a>
                <a href="product.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-gift me-2"></i>Sản phẩm</a>

                <a href="reviews.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-paperclip me-2"></i>Đánh giá</a>
                <a href="order.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-shopping-cart me-2"></i>Đơn hàng</a>
                <a href="analytics.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-chart-line me-2"></i>Thống kê</a>

                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Thống kê</h2>
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
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">

                <div class="row ">
                    <h3 class="fs-4 mb-3">Sản phẩm sắp hết hàng</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pro = new Product;
                                $show_pro = $pro->show_product_sold_2();
                                if ($show_pro) {
                                    $i = 0;
                                    while ($result = $show_pro->fetch_assoc()) {
                                        $i++;
                                ?>

                                        <tr>
                                            <th scope="row"><?php echo $i ?></th>
                                            <td><span><img width="50" src="uploads/<?php echo $result['product_img']; ?>" alt=""></span></td>
                                            <td><?php echo $result['product_name'] ?></td>
                                            <td><?php echo $result['quantity'] ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="col">

                        <select class="form-select" aria-label="Default select example" id="thongke">
                            <option value="danhmuc">Thống kê danh mục</option>
                            <option value="loaisanpham">Thống kê loại sản phẩm</option>
                        </select>
                        <div id="piechart"></div>

                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <script type="text/javascript">
                            // Load google charts
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            // Draw the initial chart
                            function drawChart() {
                                // Draw chart based on default selection (danhmuc)
                                drawChartBySelection('danhmuc');
                            }

                            // Draw chart based on user selection
                            $('#thongke').change(function() {
                                var selectedOption = $(this).val();
                                drawChartBySelection(selectedOption);
                            });

                            function drawChartBySelection(selectedOption) {
                                $.ajax({
                                    url: 'handle.php',
                                    method: 'POST',
                                    data: {
                                        option: selectedOption
                                    },
                                    dataType: 'json',
                                    success: function(data) {
                                        console.log(data);
                                        var chartData = new google.visualization.DataTable();
                                        chartData.addColumn('string', 'name'); // Chú ý rằng tên cột phải khớp chính xác với tên thuộc tính trong dữ liệu
                                        chartData.addColumn('number', 'total');
                                        $.each(data, function(key, value) {
                                            chartData.addRow([value.name, parseInt(value.total)]);
                                        });

                                        var options = {
                                            'title': 'Thống kê',
                                            'height': 265
                                        };

                                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                        chart.draw(chartData, options);
                                    }
                                });
                            }
                        </script>

                    </div>
                </div>
                <div class="row">
                    <h2>Thống kê doanh thu</h2>
                    <div class="row">
                        <select class="form-select" aria-label="Default select example" id="thongke1" style="margin-left: 20px; width: 300px;margin-bottom: 30px;">
                            <option value="15">15 ngày</option>
                            <option value="30">30 ngày</option>
                        </select>
                    </div>
                    <div id="curve_chart" style=" height: 500px"></div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart1);

                        function drawChart1() {
                            drawChartBySelection1('15');
                        }
                        $('#thongke1').change(function() {
                            var selectedOption1 = $(this).val();
                            drawChartBySelection1(selectedOption1);
                        });

                        function drawChartBySelection1(selectedOption1) {
                            $.ajax({
                                url: 'handle2.php',
                                method: 'POST',
                                data: {
                                    option: selectedOption1
                                },
                                dataType: 'json',
                                success: function(data1) {
                                    console.log(data1);
                                    var chartData1 = new google.visualization.DataTable();
                                    chartData1.addColumn('string', 'Ngày');
                                    chartData1.addColumn('number', 'Doanh thu');
                                    $.each(data1, function(key, value) {
                                        chartData1.addRow([value.order_date, parseFloat(value.daily_revenue)]);
                                    });

                                    var options1 = {
                                        title: 'Thống kê doanh thu',
                                        curveType: 'function',
                                        legend: {
                                            position: 'bottom'
                                        }
                                    };

                                    var chart1 = new google.visualization.LineChart(document.getElementById('curve_chart'));

                                    chart1.draw(chartData1, options1); 
                                }
                            });
                        }
                    </script>
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

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>