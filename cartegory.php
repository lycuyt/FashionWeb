<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- boostrap css-->
  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- custom css -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style_home.css">

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="home.html">
        <img src="./img/logo1.png" alt="site icon">
      </a>

      <div class="order-lg-2 nav-btns">

        <button type="button" class="btn position-relative">
          <input type="text" class="form-control" placeholder="Tìm kiếm" style="border-radius: 20px;">

          <button class="btn " type="submit"><i class="fa fa-search"></i></button>

          <!-- <i class="fa fa-search"></i> -->
        </button>
        <button type="button" class="btn position-relative " onclick="toCart()">
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
            <a class="nav-link text-uppercase text-dark" href="home.html">Trang chủ</a>
          </li>
          <li class="nav-item px-2 py-2">
            <a class="nav-link text-uppercase text-dark" href="#">Nữ</a>
            <ul class="sub-menu" style="list-style-type: none;">
              <li><a href="">Hàng mới về</a></li>
              <li><a href="">Collections</a></li>
              <li><a href="">Áo</a> </li>
              <li><a href="">Quần</a></li>

            </ul>
          </li>
          <li class="nav-item px-2 py-2">
            <a class="nav-link text-uppercase text-dark href=" #"">Nam</a>
            <ul class="sub-menu" style="list-style-type: none;">
              <li><a href="">Hàng mới về</a></li>
              <li><a href="">Collections</a></li>
              <li><a href="">Áo</a> </li>
              <li><a href="">Quần</a></li>

            </ul>
          </li>
          <li class="nav-item px-2 py-2">
            <a class="nav-link text-uppercase text-dark" href="#">trẻ em</a>
            <ul class="sub-menu" style="list-style-type: none;">
              <li><a href="">Hàng mới về</a></li>
              <li><a href="">Collections</a></li>
              <li><a href="">Áo</a> </li>
              <li><a href="">Quần</a></li>

            </ul>
          </li>
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
  <!---Cartegory-->
  <section class="cartegory">
    <div class="container">
      <div class="row-boloc">
        <p>Trang chu</p><span>-</span>
        <p>Ao</p> <span>-</span>
        <p>Ao so mi</p>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-3 filter">
          <div class="row py-2">
            <div class="col">
              Size
            </div>
            <div class="col">
              +
            </div>
          </div>
          <div class="row py-2">
            <div class="col">
              Màu sắc
            </div>
            <div class="col">
              +
            </div>
          </div>
          <div class="row py-2">
            <div class="col">
              Mức giá
            </div>
            <div class="col">
              +
            </div>
          </div>
          <div class="row py-2">
            <div class="col">
              Mức chiết khấu
            </div>
            <div class="col">
              +
            </div>
          </div>
          <div class="row py-2">
            <div class="col">
              Nâng cao
            </div>
            <div class="col">
              +
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row-menu">
            <div class="col-md">
              <h2>Áo sơ mi</h2>
            </div>
            <div class="col-md">
              <div class="dropdown-carterory">
                <a class="btn btn-white text-black border dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Sắp xếp theo
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Mặc định</a></li>
                  <li><a class="dropdown-item" href="#">Mới nhất</a></li>
                  <li><a class="dropdown-item" href="#">Được mua nhiều nhất</a></li>
                  <li><a class="dropdown-item" href="#">Được yêu thích nhất</a></li>
                  <li><a class="dropdown-item" href="#">Giá : cao đến thấp</a></li>
                  <li><a class="dropdown-item" href="#">Giá: Thấp đến cao</a></li>

                </ul>
              </div>
            </div>


          </div>
          <hr>
          <div class="special-list row g-0">
            <!-- lay ra san pham -->
            <?php
            include "./database.php";
            include "./class/product_class.php";
            include "./class/cartegory_class.php";
            $cartegory_name = "";
            if (isset($_GET['cartegory_name'])) {
              $cartegory_name = $_GET['cartegory_name'];
            }
            $product = new Product;
            // Tính toán số trang
            $total_products = $product->count_products($cartegory_name); // Số lượng sản phẩm
            $products_per_page = 4; // Số lượng sản phẩm mỗi trang
            $total_pages = ceil($total_products / $products_per_page); // Tính toán tổng số trang

            // Xác định trang hiện tại
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

            // Tính toán offset
            $offset = ($current_page - 1) * $products_per_page;

            // Lấy danh sách sản phẩm cho trang hiện tại
            $show_product = $product->show_product2($cartegory_name, $products_per_page, $offset);

            if ($show_product) {
              while ($result = $show_product->fetch_assoc()) {
            ?>
                <div class="col-md-6 col-lg-4 col-xl-3 p-2" onclick="toProduct('<?php echo $result['product_id'] ?>')">
                  <div class="special-img position-relative overflow-hidden">
                    <img src="./admin//uploads/<?php echo $result['product_img']; ?>" class="w-100 ctborder">
                    <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                    </span>
                  </div>
                  <div class="text-center">
                    <p class="text-capitalize mt-3 mb-1"><?php echo $result['product_name'] ?></p>
                    <span class="fw-bold d-block">$<?php echo $result['product_price'] ?></span>
                    <a href="#" class="btn btn-primary mt-3">Thêm vào giỏ hàng</a>
                  </div>
                </div>

            <?php
              }
            }
            ?>
          </div>
          <ul class="pagination justify-content-center">
            <!-- <li class="page-item"><a class="page-link text-primary" href="#">&#60;&#60;</a></li>
            <li class="page-item"><a class="page-link text-primary" href="#">1</a></li>
            <li class="page-item"><a class="page-link text-primary" href="#">2</a></li>
            <li class="page-item"><a class="page-link text-primary" href="#">3</a></li>
            <li class="page-item"><a class="page-link text-primary" href="#">4</a></li>
            <li class="page-item"><a class="page-link text-primary" href="#">5</a></li>
            <li class="page-item"><a class="page-link text-primary" href="#">&#62;&#62;</a></li>
            <li class="page-item"><a class="page-link text-primary" href="#">Trang cuối</a></li>
             -->

            <!-- <?php if ($current_page > 1) : ?>
              <li class="page-item"><a class="page-link text-primary" href="?cartegory_name=<?php echo $cartegory_name ?>&page=1">&#60;&#60;</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
              <li class="page-item <?php echo ($current_page == $i) ? 'active' : ''; ?>"><a class="page-link text-primary" href="?cartegory_name=<?php echo $cartegory_name ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages) : ?>
              <li class="page-item"><a class="page-link text-primary" href="?cartegory_name=<?php echo $cartegory_name ?>&page=<?php echo $total_pages; ?>">&#62;&#62;</a></li>
            <?php endif; ?>

            <li class="page-item"><a class="page-link text-primary" href="?cartegory_name=<?php echo $cartegory_name ?>&page=<?php echo $total_pages; ?>">Trang cuối</a></li> -->


            <?php if ($current_page > 1) : ?>
              <?php if ($current_page == 3) : ?>
                <li class="page-item"><a class="page-link text-primary" href="?cartegory_name=<?php echo $cartegory_name ?>&page=<?php echo $current_page - 1; ?>">&#60;&#60;</a></li>
              <?php else : ?>
                <li class="page-item"><a class="page-link text-primary" href="?cartegory_name=<?php echo $cartegory_name ?>&page=<?php echo $current_page - 1; ?>">&#60;&#60;</a></li>
              <?php endif; ?>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
              <li class="page-item <?php echo ($current_page == $i) ? 'active' : ''; ?>"><a class="page-link text-primary" href="?cartegory_name=<?php echo $cartegory_name ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages) : ?>
              <li class="page-item"><a class="page-link text-primary" href="?cartegory_name=<?php echo $cartegory_name ?>&page=<?php echo $current_page + 1; ?>">&#62;&#62;</a></li>
            <?php else : ?>
              <li class="page-item"><a class="page-link text-primary" href="?cartegory_name=<?php echo $cartegory_name ?>&page=<?php echo $total_pages; ?>">&#62;&#62;</a></li>
            <?php endif; ?>

            <li class="page-item"><a class="page-link text-primary" href="?cartegory_name=<?php echo $cartegory_name ?>&page=<?php echo $total_pages; ?>">Trang cuối</a></li>
          </ul>

        </div>


      </div>
    </div>

  </section>
  <hr>

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
        </div>
      </div>
    </div>
    <div class="container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.
      372394250898!2d105.77531897471303!3d20.977704489531256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134532dbed14dcb%3A0x
      55bbcd202dbb3347!2zMjAgTmcuIDM1IFAuIE5nw7QgVGjDrCBT4bu5LCBW4bqhbiBQaMO6YywgSMOgIMSQw7RuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1sv
      i!2s!4v1713280437326!5m2!1svi!2s" width=100% height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

  </footer>
  <!-- backtop -->
  <div id="backtop">
    <i class="fa-solid fa-chevron-up"></i>
  </div>
  <script src="js/jquery-3.7.1.js"></script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
  <!-- custom js -->
  <script src="js/script.js"></script>
</body>

</html>