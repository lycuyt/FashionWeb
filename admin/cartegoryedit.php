<?php
include "header.php";
include "class/cartegory_class.php";
?>
<?php
$cartegory = new Cartegory;
if (isset($_GET['cartegory_id'])) {
    $cartegory_id = $_GET['cartegory_id'];
    $get_cartegory =  $cartegory->get_cartegory($cartegory_id);
    if ($get_cartegory) {
        $result = $get_cartegory->fetch_assoc();
    }
}
?>
<?php
if (isset($_POST['btn_Them'])) {
    $cartegory_name = $_POST['cartegory_name'];
    $update_cartegory = $cartegory->update_cartegory($cartegory_name, $cartegory_id);
}

?>
<?php include "slider.php" ?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Danh mục sản phẩm</h2>
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
                        $count = $cartegory->count_category();
                        ?>
                        <h3 class="fs-2"><?php echo $count; ?></h3>
                        <p class="fs-5">Danh mục</p>
                    </div>
                    <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

        </div>
        <div class="row">
            <!--              
                <form action="" method="post">
                    <input required name="cartegory_name" type="text" placeholder="Nhap ten danh muc" 
                    value="<?php echo $result['cartegory_name'] ?>">
                    <button name="btn_Them" type="submit">Update</button>
                </form> -->
            <form action="" method="post">
                <div class="mb-3  " style="width :50%" >
                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                    <input required name="cartegory_name" type="text"  value="<?php echo $result['cartegory_name'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                </div>
                <button name="btn_Them" type="submit" class="btn btn-primary">Sửa</button>
                <a href="category.php" class="btn btn-primary">Hủy</a>
            </form>

        </div>
    </div>
</div>
</div>

<!-- /#page-content-wrapper -->
<?php include "footer.php" ?>