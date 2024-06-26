<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- boostrap css-->
  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- custom css -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style_home.css">
<body>
  <!-- navbar -->
  <nav class = "navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
    <div class = "container">
        <a class = "navbar-brand d-flex justify-content-between align-items-center order-lg-0" href = "home.html">
            <img src = "./img/logo1.png" alt = "site icon">
        </a>

        <div class = "order-lg-2 nav-btns">
           
            <button type="button" class="btn position-relative">
                <input type = "text" class = "form-control" placeholder="Tìm kiếm" style="border-radius: 20px;">
                
                <button class = "btn " type = "submit"><i class="fa fa-search"></i></button>
                
                <!-- <i class="fa fa-search"></i> -->
            </button>
            <button type="button" class="btn position-relative " onclick="toCart()">
                <i class="fa fa-shopping-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge bg-primary" >5</span>
            </button>
            <button type="button" class="btn position-relative">
                <i class="fa fa-heart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">2</span>
            </button>
            
        </div>

        <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
            <span class = "navbar-toggler-icon"></span>
        </button>

        <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
            <ul class = "navbar-nav ">
                <li class = "nav-item px-2 py-2">
                    <a class = "nav-link text-uppercase text-dark" href="home.html">Trang chủ</a>
                </li>
                <li class = "nav-item px-2 py-2">
                    <a class = "nav-link text-uppercase text-dark" href="#">Nữ</a>
                    <ul class="sub-menu" style="list-style-type: none;">
                        <li><a href="">Hàng mới về</a></li>
                        <li><a href="">Collections</a></li>
                        <li><a href="">Áo</a> </li>
                        <li><a href="">Quần</a></li>
              
                      </ul>
                </li>
                <li class = "nav-item px-2 py-2">
                    <a class = "nav-link text-uppercase text-dark href="#"" >Nam</a>
                    <ul class="sub-menu" style="list-style-type: none;">
                        <li><a href="">Hàng mới về</a></li>
                        <li><a href="">Collections</a></li>
                        <li><a href="">Áo</a> </li>
                        <li><a href="">Quần</a></li>
              
                      </ul>
                </li>
                <li class = "nav-item px-2 py-2">
                    <a class = "nav-link text-uppercase text-dark" href="#">trẻ em</a>
                    <ul class="sub-menu" style="list-style-type: none;">
                        <li><a href="">Hàng mới về</a></li>
                        <li><a href="">Collections</a></li>
                        <li><a href="">Áo</a> </li>
                        <li><a href="">Quần</a></li>
              
                      </ul>
                </li>
                <li class = "nav-item px-2 py-2">
                    <a class = "nav-link text-uppercase text-dark"href="#">Về chúng tôi</a>
                </li>
                <li class = "nav-item px-2 py-2 border-0">
                    <a class = "nav-link text-uppercase text-dark"href="#">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
  <!-- end navbar -->
  <!---Cartegory-->
  <section class="cartegory" style="padding-top: 50px;">
    <div class="container">
      <?php 
        include"./database.php";
        include "./class/product_class.php";
        $product_id = $_GET['product_id'];
        $product= new Product;
        $get_product =  $product->show_product3($product_id);
        if ($get_product) {
          $result = $get_product->fetch_assoc();
        }
      ?>
        <div class="row-boloc">
            <p>Trang chu</p><span>-</span><p><?php echo $result['cartegory_name'] ?></p>-</span><p><?php echo $result['brand_name'] ?></p> <span>-

            </span> <p><p><?php echo $result['product_name'] ?></p>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-md-10">
                      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="./img/ao1.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="./img/ao1_1.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="./img/ao1_2.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="./img/ao1_3.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="./img/ao1_4.jpg" class="d-block w-100" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <img class="img-item-prd" src="img/ao1_1.jpg" alt="">
                        <img class="img-item-prd"  src="img/ao1_2.jpg" alt="">
                        <img class="img-item-prd"  src="img/ao1_3.jpg" alt="">
                        <img class="img-item-prd"  src="img/ao1_4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col ms-5 px-3">
                <h2><p><?php echo $result['product_name'] ?></h2>
                <p>SKU: 17B9612</p>
                <p><p><?php echo $result['product_price'] ?>đ </p>
                <p>Màu sắc: Trắng ngà</p>
                <br>
                <button type="button" class="btn btn-light btn-sm">S</button>
                <button type="button" class="btn btn-light btn-sm">M</button>
                <button type="button" class="btn btn-light btn-sm">L</button>
                <button type="button" class="btn btn-light btn-sm">XL</button>
                <button type="button" class="btn btn-light btn-sm">XXL</button>
                <br>
                <br>
                <p>Số lượng</p>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link text-primary" href="#">-</a></li>
                    <li class="page-item"><a class="page-link text-primary" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-primary" href="#">+</a></li>
                </ul>
                <br>
                <button type="button" class="btn btn btn-dark">Thêm vào giỏ hàng</button>
                <button type="button" class="btn btn-light border">Mua hàng</button>
                <button type="button" class="btn btn-light border"><i class="fa-regular fa-heart"></i></button>
                <br>
                <br>
                <a href="home.html" style="text-decoration: underline;color: pink;">Tìm kiếm tại cửa hàng</a>

                <hr>
                <ul class="nav nav-tabs"  id="myTabs">
                    <li class="nav-item">
                      <a class="nav-link active text-black" id="tab1-tab" href="#gioithieu">GIỚI THIỆU</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-black" id="tab2-tab" href="#chitiet">CHI TIẾT SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-black" id="tab3-tab" href="#baoquan">BẢO QUẢN</a>
                    </li>
                    
                </ul>
                <div class="tab-content mt-2">
                  <div class="tab-pane fade show active" id="gioithieu">
                    
                    <p>
                      <?php echo $result['product_desc'] ?>
                      <a data-bs-toggle="collapse" href="#collapseTab1" role="button" aria-expanded="false" aria-controls="collapseTab1" ><i class="fa-solid fa-caret-down  text-primary"></i></a>
                    </p>
                    <div class="collapse" id="collapseTab1">
                      <p>
                        - Bạn có thể kết hợp áo với chân váy công sở, quần âu, hoặc cả quần jean tùy thuộc vào sự kiện và phong cách cá nhân. <br>
    
                        Chiều cao: 167 cm<br>
    
                        Cân nặng: 50 kg<br>
    
                        Số đo 3 vòng: 83-65-93 cm<br>
    
                        Mẫu mặc size M<br>
    
                        Lưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.
                      </p>
                    </div>
                    
                  </div>
                  <div class="tab-pane fade" id="chitiet">
                    <p>
                      Dòng sản phẩm	You <br>
                      Nhóm sản phẩm	Áo <br>
                      Cổ áo	Cổ đức<br>
                      <a data-bs-toggle="collapse" href="#collapseTab2" role="button" aria-expanded="false" aria-controls="collapseTab2"><i class="fa-solid fa-caret-down  text-primary"></i></a>
                    </p>
                    <div class="collapse" id="collapseTab2">
                      <p>
                        Tay áo	Tay dài<br>
                        Kiểu dáng	Xuông<br>
                        Độ dài	Dài thường<br>
                        Họa tiết	Trơn<br>
                        Chất liệu	Lụa<br>
                      </p>
                    </div>  
                  </div>
                  <div class="tab-pane fade" id="baoquan">
                    <p>
                      Chi tiết bảo quản sản phẩm : <br>
  
                      * Các sản phẩm thuộc dòng cao cấp (Senora) và áo khoác (dạ, tweed, lông, phao) chỉ giặt khô, tuyệt đối không giặt ướt.<br>
  
                      * Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tránh bai giãn.<br>
                      <a data-bs-toggle="collapse" href="#collapseTab3" role="button" aria-expanded="false" aria-controls="collapseTab3" ><i class="fa-solid fa-caret-down  text-primary"></i></a>
                    </p>
                    <div class="collapse" id="collapseTab3">
                      <p>
                        * Vải voan, lụa, chiffon nên giặt bằng tay.<br>
    
                        * Vải thô, tuytsi, kaki không có phối hay trang trí đá cườm thì có thể giặt máy.<br>
    
                        * Vải thô, tuytsi, kaki có phối màu tương phản hay trang trí voan, lụa, đá cườm thì cần giặt tay.<br>
    
                        * Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans. Nếu giặt thì nên lộn trái sản phẩm khi giặt, đóng khuy, kéo khóa, không nên giặt chung cùng đồ sáng màu, tránh dính màu vào các sản phẩm khác. <br>
    
                        * Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu, phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh, nên giặt cùng xà phòng pha loãng.<br>
    
                        * Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ, vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.<br>
    
                        * Nên phơi sản phẩm tại chỗ thoáng mát, tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu, nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.<br>
    
                        * Những chất vải 100% cotton, không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải.<br>
    
                        * Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng, mát và không bị cháy, giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải. <br>
                      </p>
                    </div>
                    
                  </div>
                </div>
            </div>
                
        </div>
    </div>
    <script>
      // Lắng nghe sự kiện khi tab được click
      var tabs = document.querySelectorAll('.nav-link');
      tabs.forEach(function(tab) {
        tab.addEventListener('click', function(event) {
          event.preventDefault();
          var tabId = event.target.getAttribute('href').substr(1);
          var activeTab = document.querySelector('.nav-link.active');
          activeTab.classList.remove('active');
          event.target.classList.add('active');
          
          var activeContent = document.querySelector('.tab-pane.fade.show.active');
          activeContent.classList.remove('show', 'active');
  
          var newActiveContent = document.getElementById(tabId);
          newActiveContent.classList.add('show', 'active');
        });
      });
    </script> 
    <hr>
    <div class="container">
      <div class="row text-center">
        <h2>Sản phẩm tương tự</h2>
      </div>
      <div class = "special-list row g-0">
        <div class = "col-md-6 col-lg-4 col-xl-3 p-2">
            <div class = "special-img position-relative overflow-hidden">
                <img src = "./img/ao1.jpg" class = "w-100 ctborder">
                <span class = "position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                    <i class = "fas fa-heart"style="color: #f78f9a;"></i>
                </span>
            </div>
            <div class = "text-center">
                <p class = "text-capitalize mt-3 mb-1">gray shirt</p>
                <span class = "fw-bold d-block">$ 45.50</span>
                <a href = "#" class = "btn btn-primary mt-3">Thêm vào giỏ hàng</a>
            </div>
        </div>

        <div class = "col-md-6 col-lg-4 col-xl-3 p-2">
            <div class = "special-img position-relative overflow-hidden">
                <img src = "/img/ao2.jpg" class = "w-100 ctborder">
                <span class = "position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                    <i class = "fas fa-heart"style="color: #f78f9a;"></i>
                </span>
            </div>
            <div class = "text-center">
                <p class = "text-capitalize mt-3 mb-1">gray shirt</p>
                <span class = "fw-bold d-block">$ 45.50</span>
                <a href = "#" class = "btn btn-primary mt-3">Thêm vào giỏ hàng</a>
            </div>
        </div>

        <div class = "col-md-6 col-lg-4 col-xl-3 p-2">
            <div class = "special-img position-relative overflow-hidden">
                <img src = "./img/ao3.jpg" class = "w-100 ctborder">
                <span class = "position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                    <i class = "fas fa-heart"style="color: #f78f9a;"></i>
                </span>
            </div>
            <div class = "text-center">
                <p class = "text-capitalize mt-3 mb-1">gray shirt</p>
                <span class = "fw-bold d-block">$ 45.50</span>
                <a href = "#" class = "btn btn-primary mt-3">Thêm vào giỏ hàng</a>
            </div>
        </div>

        <div class = "col-md-6 col-lg-4 col-xl-3 p-2">
            <div class = "special-img position-relative overflow-hidden">
                <img src = "./img/ao4.jpg" class = "w-100 ctborder">
                <span class = "position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                    <i class = "fas fa-heart"style="color: #f78f9a;"></i>
                </span>
            </div>
            <div class = "text-center">
                <p class = "text-capitalize mt-3 mb-1">gray shirt</p>
                <span class = "fw-bold d-block">$ 45.50</span>
                <a href = "#" class = "btn btn-primary mt-3">Thêm vào giỏ hàng</a>
            </div>
        </div>
    </div>
    </div>
  </section>
  <hr>
  <!-- footer -->
  <footer class = "bg-dark py-5">
    <div class = "container">
        <div class = "row text-white g-4">
            <div class = "col-md-6 col-lg-3">
                <a class = "text-uppercase text-decoration-none brand text-white" href = "home.html">Cuytcuyt</a>
                <p class = "text-white text-muted mt-3">
                  Công ty cổ phần Cuytcuyt
                  Chúng tôi mang đến những sản phẩm tốt nhất với giá cả hợp lý
                </p>
            </div>

            <div class = "col-md-6 col-lg-3">
                <h5 class = "fw-light">Danh mục</h5>
                <ul class = "list-unstyled">
                    <li class = "my-3">
                        <a href = "#" class = "text-white text-decoration-none text-muted">
                            <i class = "fas fa-chevron-right me-1"></i> Trang chủ
                        </a>
                    </li>
                    <li class = "my-3">
                        <a href = "#" class = "text-white text-decoration-none text-muted">
                            <i class = "fas fa-chevron-right me-1"></i>  Nữ
                        </a>
                    </li>
                    <li class = "my-3">
                        <a href = "#" class = "text-white text-decoration-none text-muted">
                            <i class = "fas fa-chevron-right me-1"></i> Nam
                        </a>
                    </li>
                    <li class = "my-3">
                        <a href = "#" class = "text-white text-decoration-none text-muted">
                            <i class = "fas fa-chevron-right me-1"></i> Trẻ em
                        </a>
                    </li>
                </ul>
            </div>

            <div class = "col-md-6 col-lg-3">
                <h5 class = "fw-light mb-3">Liên hệ với chúng tôi</h5>
                <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                    <span class = "me-3">
                        <i class = "fas fa-map-marked-alt"></i>
                    </span>
                    <span class = "fw-light">
                       Ngõ 35, Ngô Thì Sỹ, Vạn Phúc, Hà Đông
                    </span>
                </div>
                <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                    <span class = "me-3">
                        <i class = "fas fa-envelope"></i>
                    </span>
                    <span class = "fw-light">
                        lycuyt@gmail.com
                    </span>
                </div>
                <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                    <span class = "me-3">
                        <i class = "fas fa-phone-alt"></i>
                    </span>
                    <span class = "fw-light">
                        +9786 6776 236
                    </span>
                </div>
            </div>

            <div class = "col-md-6 col-lg-3">
                <h5 class = "fw-light mb-3">Theo dõi chúng tôi</h5>
                <div>
                    <ul class = "list-unstyled d-flex">
                        <li>
                            <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                <i class = "fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                <i class = "fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                <i class = "fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                <i class = "fab fa-youtube"></i>
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
      i!2s!4v1713280437326!5m2!1svi!2s" width=100% height="450" style="border:0;" allowfullscreen=""
       loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
    </div>
    
  </footer>
  <!-- backtop -->
  <div id="backtop">
    <i class="fa-solid fa-chevron-up"></i>
  </div>
  <script src = "js/jquery-3.7.1.js"></script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
  <!-- custom js -->
  <script src = "js/script.js"></script>
</body>
<script>
  const header = document.querySelector("header");
  window.addEventListener("scroll", function(){
    x = window.pageYOffset;
    if(x>0)
    {
      header.classList.add("sticky");
    }else{
      header.classList.remove("sticky");
    }
  })


  const imgPosition = document.querySelectorAll(".aspect-ratio-169 img ");
  const imgContainer = document.querySelector('.aspect-ratio-169');
  const dotItem = document.querySelectorAll('.dot');
  let imgNumber = imgPosition.length;
  let index = 0;
  // console.log(imgPosition);
  imgPosition.forEach(function(image, index){
    image.style.left = index*100+"%";
    dotItem[index].addEventListener("click",function(){
      slider(index)
    })

  })
  function imgSlide()
  {
    index++;
    if(index>=imgNumber){
      index = 0;
    }
    slider(index);
  }
  function slider(index)
  {
    imgContainer.style.left = "-" + index*100 +"%";
    const dotActive = document.querySelector('.active');
    dotActive.classList.remove('active');
    dotItem[index].classList.add("active");
  }
  setInterval(imgSlide, 4000);
</script>
</html>