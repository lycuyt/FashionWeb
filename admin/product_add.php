<?php
    include "header.php";
    include "class/product_class.php"; 
?>
<?php
    $product = new Product;
    if(isset($_POST['btn'])){
        $product_name = $_POST['product_name'];
        $cartegory_id = $_POST['cartegory_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_price_new = $_POST['product_price_new'];
        $product_desc= $_POST['product_desc'];
        $quantity = $_POST['quantity'];
        $quantity_sold = $_POST['quantity_sold'];

        $image = $_FILES['product_img']['name'];
        $image_tmp_name = $_FILES['product_img']['tmp_name'];        
        move_uploaded_file($image_tmp_name, "uploads/".$image);

        $insert_product = $product ->insert_product($product_name, $cartegory_id,
        $brand_id, $product_price, $product_price_new, $product_desc, $image,$quantity, $quantity_sold, $image_tmp_name);


    }
?>
<?php include "slider.php" ?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Sản phẩm</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img style="border-radius: 50%;" width="40"  src="uploads/<?php echo $_SESSION['mySession']; ?>.png" alt="">
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
                            $count = $product ->count_product(); 
                        ?>
                        <h3 class="fs-2"><?php echo $count ?></h3>
                        <p class="fs-5">Sản phẩm</p>
                    </div>
                    <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

        </div>
        <div class="row my-5">
            <form action="product_add.php" method="post" enctype="multipart/form-data">
                <!-- <label for="">Nhap ten san pham<span style="color: red;">*</span></label>
                <input name="product_name" type="text" required value="<?php echo $resultA['product_name'] ?>"> -->
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Tên sản phẩm<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name = "product_name" placeholder="Nhập tên sản phẩm" required>
                </div>
                <label for="">Tên danh mục<span style="color: red;">*</span></label>
                <select class="form-select" aria-label="Default select example" name="cartegory_id" id="cartegory_id">
                    <option value="">--Chọn danh mục</option>
                        <?php 
                            $show_cartegory = $product->show_cartegory();
                            if($show_cartegory)
                            {
                                while($result = $show_cartegory->fetch_assoc()){

                                
                        ?>
                        <option value="<?php echo $result['cartegory_id'];?>"><?php echo $result['cartegory_name'];?></option>
                       <?php 
                                }
                            }
                       ?>

                </select>
                <label for="">Tên loại sản phẩm<span style="color: red;">*</span></label>
                <select class="form-select" aria-label="Default select example" name="brand_id" id="brand_id">
                    <option value="">--Chọn loại sản phẩm</option>
                </select>
               
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Giá<span style="color: red;">*</span></label>
                    <input type="number" class="form-control" name = "product_price" placeholder="Nhập giá sản phẩm" required >
                </div>
              
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Giá sale<span style="color: red;">*</span></label>
                    <input type="number" class="form-control" name = "product_price_new" placeholder="Nhập giá sale" required >
                </div>
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Số lượng <span style="color: red;">*</span></label>
                    <input type="number" class="form-control" name = "quantity" placeholder="Nhập số lượng " required >
                </div>
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Số lượng đá bán<span style="color: red;">*</span></label>
                    <input type="number" class="form-control" name = "quantity_sold" placeholder="Nhập số lượng đã bán" required >
                </div>
                <div class="mb-3 mt-3"> 
                    <label for="">Mô tả sản phẩm<span style="color: red;">*</span></label>
                    <textarea required name="product_desc" id="editor1" class="form-control" > </textarea>
                </div>
                
                <div class="mb-3 mt-3"> 
                    <label for="text" class="form-label">Ảnh sản phẩm<span style="color: red;">*</span></label>
                   
                    <input  name="product_img" type="file">
                </div>
                
                <div class="mb-3 mt-3"> 
                    <label for="text" class="form-label">Các ảnh mô tả<span style="color: red;">*</span></label>
                    <input name="product_img_desc[]" multiple type="file">
                </div>
                
                
                <button name = "btn" type="submit" class="btn btn-primary">Thêm</button>
                <a href="product.php" class="btn btn-primary">Hủy</a>
            </form>
        </div>

    </div>
</div>
</div>
<!-- /#page-content-wrapper -->
<?php include "footer.php" ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor1'))
        .catch(error => {
            console.error(error);
        })
</script>

</html>
<!-- ajax -->
<script>
    $(document).ready(function(){
        $("#cartegory_id").change(function(){
            var x = $(this).val();
            $.get("productadd_ajax.php",{cartegory_id:x},function(data){
                $("#brand_id").html(data);
            })
        })
    })
</script>
