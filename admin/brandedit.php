<?php
include "header.php";
include "class/brand_class.php";
?>

<?php
$brand = new Brand;
$brand_id = $_GET['brand_id'];
$get_brand =  $brand->get_brand($brand_id);
if ($get_brand) {
    $resultA = $get_brand->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_id = $_POST['cartegory_id'];
    $brand_name = $_POST['brand_name'];
    $update_brand = $brand->update_brand($cartegory_id, $brand_name, $brand_id);
}


?>
<style>
    select {
        height: 30px;
        width: 200px;
    }
</style>
<?php include "slider.php" ?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Các loại sản phẩm</h2>
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
                            $count = $brand ->count_brand();
                        ?>
                        <h3 class="fs-2"><?php echo $count ?></h3>
                        <p class="fs-5">Loại sản phẩm</p>
                    </div>
                    <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

        </div>
        <div class="row">
            <form action="" method="post">
                <label>Tên danh mục</label>
                <select class="form-select" aria-label="Default select example" name="cartegory_id" id="" style="height: 40px;">
                    <option value="">--Chọn danh mục</option>
                    <?php
                    $show_cartegory = $brand->show_cartegory();
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
                    
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên loại sản phẩm</label>
                    <input required name="brand_name" type="text" value="<?php echo $resultA['brand_name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
                <a href="brand.php" class="btn btn-primary">Hủy</a>
            </form>

        </div>
    </div>
</div>
</div>

<!-- /#page-content-wrapper -->
<?php include "footer.php" ?>