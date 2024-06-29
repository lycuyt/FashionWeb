<?php
include "header.php";
include "class/product_class.php";


?>
<?php
$product = new Product;
$product_id = $_GET['product_id'];
$get_product =  $product->get_product($product_id);
if ($get_product) {
    $resultA = $get_product->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $cartegory_id = $_POST['cartegory_id'];
    $brand_id = $_POST['brand_id'];
    $product_price = $_POST['product_price'];
    $product_price_new = $_POST['product_price_new'];
    $product_desc = $_POST['product_desc'];
    $quantity = $_POST['quantity'];
    $quantity_sold = $_POST['quantity_sold'];

    if ($_FILES['product_img']['size'] > 0) {
        $image = $_FILES['product_img']['name'];
        $image_tmp_name = $_FILES['product_img']['tmp_name'];
        move_uploaded_file($image_tmp_name, 'uploads/' . $image);

        // Update with new image
        $update_product = $product->update_product(
            $product_name,
            $cartegory_id,
            $brand_id,
            $product_price,
            $product_price_new,
            $product_desc,
            $image,
            $quantity,
            $quantity_sold,
            $product_id
        );
    } else {
        $update_product = $product->update_product_2(
            $product_name,
            $cartegory_id,
            $brand_id,
            $product_price,
            $product_price_new,
            $product_desc,
            $quantity,
            $quantity_sold,
            $product_id
        );
    }

    $has_uploaded_files = false;

    foreach ($_FILES['product_img_desc']['error'] as $error) {
        if ($error == UPLOAD_ERR_OK) {
            $has_uploaded_files = true;
            break;
        }
    }

    if ($has_uploaded_files) {
        $desc_img_delete = $product->delete_img_desc($product_id); 

        $filename = $_FILES['product_img_desc']['name'];
        $file_tmp = $_FILES['product_img_desc']['tmp_name'];
        $update_img_desc = $product->update_img_desc($filename, $file_tmp, $product_id);
    } else {
 
        $update_img_desc = false; // Không cần cập nhật ảnh mô tả
        header('location: product.php');
    }

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
            <form action="" method="post" enctype="multipart/form-data">
                <!-- <label for="">Nhap ten san pham<span style="color: red;">*</span></label>
                <input name="product_name" type="text" required value="<?php echo $resultA['product_name'] ?>"> -->
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Tên sản phẩm<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name = "product_name" placeholder="Nhập tên sản phẩm" required value="<?php echo $resultA['product_name'] ?>">
                </div>
                <label for="">Tên danh mục<span style="color: red;">*</span></label>
                <select class="form-select" aria-label="Default select example" name="cartegory_id" id="cartegory_id">
                    <option value="">--Chọn danh mục</option>
                    <?php
                    $show_cartegory = $product->show_cartegory();
                    if ($show_cartegory) {
                        while ($result = $show_cartegory->fetch_assoc()) {


                    ?>
                            <option <?php if ($resultA['cartegory_id'] == $result['cartegory_id']) {
                                        echo "SELECTED";
                                    } ?> value="<?php echo $result['cartegory_id']; ?>"><?php echo $result['cartegory_name']; ?></option>
                           
                    <?php
                        }
                    }
                    ?>

                </select>
                <label for="">Tên loại sản phẩm<span style="color: red;">*</span></label>
                <select class="form-select" aria-label="Default select example" name="brand_id" id="brand_id">
                    <option value="">--Chọn loại sản phẩm</option>
                    <?php
                    $show_brand = $product->show_brand($resultA['cartegory_id']);
                    if ($show_brand) {
                        while ($result = $show_brand->fetch_assoc()) {


                    ?>
                            <option <?php if ($resultA['brand_id'] == $result['brand_id']) {
                                        echo "SELECTED";
                                    } ?> value="<?php echo $result['brand_id']; ?>"><?php echo $result['brand_name']; ?></option>
                    <?php
                        }
                    }
                    ?>

                </select>
                <!-- <label for="">Gia san pham<span style="color: red;">*</span></label>
                <input name="product_price" type="text" required value="<?php echo $resultA['product_price'] ?>"> -->
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Giá<span style="color: red;">*</span></label>
                    <input type="number" class="form-control" name = "product_price" placeholder="Nhập giá sản phẩme" required value="<?php echo $resultA['product_price'] ?>">
                </div>
                <!-- <label for="">Gia khyuen mai<span style="color: red;">*</span></label>
                <input name="product_price_new" type="text" required value="<?php echo $resultA['product_price_new'] ?>"> -->
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Giá sale<span style="color: red;">*</span></label>
                    <input type="number" class="form-control" name = "product_price_new" placeholder="Nhập giá sale" required value="<?php echo $resultA['product_price_new'] ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Số lượng <span style="color: red;">*</span></label>
                    <input type="number" class="form-control" name = "quantity" placeholder="Nhập số lượng" required value="<?php echo $resultA['quantity'] ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Số lượng đá bán<span style="color: red;">*</span></label>
                    <input type="number" class="form-control" name = "quantity_sold" placeholder="Nhập số lượng đã bán" required value="<?php echo $resultA['quantity_sold'] ?>">
                </div>    
                <div class="mb-3 mt-3"> 
                    <label for="">Mô tả sản phẩm<span style="color: red;">*</span></label>
                    <textarea required name="product_desc" id="editor1" cols="30" rows="10"> <?php echo $resultA['product_desc'] ?></textarea>
                </div>
                
                <div class="mb-3 mt-3"> 
                    <label for="text" class="form-label">Ảnh sản phẩm<span style="color: red;">*</span></label>
                    <span><img width="100" src="uploads/<?php echo $resultA['product_img']; ?>" alt=""></span>
                    <input  name="product_img" type="file">
                </div>
                
                <div class="mb-3 mt-3"> 
                    <label for="text" class="form-label">Các ảnh mô tả<span style="color: red;">*</span></label>
               
                    <?php
                    $product_id = $resultA['product_id'];
                    $show_img_desc =  $product->show_img_desc($product_id);
                    if ($show_img_desc) {
                        while ($resultA = $show_img_desc->fetch_assoc()) {
                    ?>
                            <span><img style="margin-right: 10px;" width="100" src="uploads/<?php echo $resultA['product_img_desc']; ?>" alt=""></span>
                    <?php
                        }
                    }
                    ?>
                    <input name="product_img_desc[]" multiple type="file">
                </div>
                
                
                <button type="submit" class="btn btn-primary">Sửa</button>
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

<script>
    $(document).ready(function() {
        $("#cartegory_id").change(function() {
            var x = $(this).val();
            $.get("productadd_ajax.php", {
                cartegory_id: x
            }, function(data) {
                $("#brand_id").html(data);
            })
        })
    })
</script>