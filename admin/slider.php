
<body>
        <div class="d-flex" id="wrapper">
                <!-- Sidebar -->
                <div class="bg-white" id="sidebar-wrapper">
                        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"></i>fashion</div>
                        <div class="list-group list-group-flush my-3">
                                <!-- <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="category.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Categories</a>
                <a href="brand.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Brands</a>
                <a href="product.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Products</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Analytics</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Reports</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Store Mng</a>
                
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Chat</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-map-marker-alt me-2"></i>Outlet</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a> -->
                                <?php
                                $current_page = basename($_SERVER['PHP_SELF']); // Lấy tên của trang hiện tại

                                // Mảng chứa các liên kết, tiêu đề và biểu tượng của mỗi trang
                                $pages = array(
                                        "index.php" => array("Trang chủ", "fa-tachometer-alt"),
                                        "category.php" => array("Danh mục", "fa-project-diagram"),
                                        "brand.php" => array("Loại sản phẩm", "fa-gift"),
                                        "product.php" => array("Sản phẩm", "fa-shopping-cart"),
                                        "reviews.php" => array("Đánh giá", "fas fa-paperclip"),
                                        "order.php" => array("Đơn hàng", "fa-shopping-cart"),
                                        "analytics.php" => array("Thống kê", "fas fa-chart-line "),
                                        "logout.php" => array("Đăng xuất", "fa-power-off "),
                                        // Thêm các trang khác nếu cần thiết
                                );

                                ?>

                                <div class="list-group list-group-flush my-3">
                                        <?php
                                        // Lặp qua mỗi trang và tạo thẻ liên kết
                                        foreach ($pages as $page_link => $page_info) {
                                                $page_title = $page_info[0]; // Lấy tiêu đề của trang
                                                $icon_class = $page_info[1]; // Lấy tên lớp của biểu tượng

                                                // Kiểm tra nếu trang hiện tại trùng với trang đang lặp
                                                $class = ($current_page == $page_link) ? 'active' : '';

                                                // Tạo thẻ liên kết với tiêu đề, biểu tượng và lớp CSS tương ứng
                                                echo '<a href="' . $page_link . '" class="list-group-item list-group-item-action bg-transparent second-text ' . $class . ' fw-bold"><i class="fas ' . $icon_class . ' me-2"></i>' . $page_title . '</a>';
                                        }
                                        ?>
                                </div>


                        </div>
                </div>
                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->