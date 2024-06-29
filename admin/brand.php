<?php
include "header.php";
include "class/brand_class.php";
?>
<?php
    $brand= new Brand;
    $show_brand = $brand -> show_brand();
?>
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
        <div class="row my-5">
            <div class="col-md-3">
                <h3 class="fs-4 mb-3">Danh sách loại sản phẩm</h3>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-10 ">
                        <form action="" method="post">
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
            <div class="col-md-3 d-flex justify-content-center">
                <div class="small-button-container">
                    <a href="brandadd.php">
                        <button type="button" class="btn btn-primary">Thêm</button>
                    </a>

                </div>
            </div>

        </div>

        <div class="row my-5">


            <div class="col">
                <table class="table bg-white rounded shadow-sm  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="100">#</th>
                            <th scope="col">Mã </th>
                            <th scope="col">Tên</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($show_brand){
                                $i=0;
                                while($result = $show_brand->fetch_assoc()){
                                    $i++;
                            
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $result['brand_id']; ?></td>
                                    <td><?php echo $result['brand_name']; ?></td>
                                    <td><?php echo $result['cartegory_name']; ?></td>
                                    <td><a href="brandedit.php?brand_id=<?php echo $result['brand_id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href="branddelete.php?brand_id=<?php echo $result['brand_id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
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