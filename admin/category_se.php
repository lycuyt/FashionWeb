<?php
include "header.php";
include "class/cartegory_class.php";
?>
<?php
$cartegory = new Cartegory;
if (isset($_POST['submit'])) {
    $category_name = $_POST['search'];
    $show_cartegory = $cartegory->search_live($category_name);
 
} else {
    header('location: .');
    exit();
}

?>
<?php include "slider.php" ?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Dashboard</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-2"></i><?php echo $_SESSION['mySession'] ?>
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
                        <p class="fs-5">Categories</p>
                    </div>
                    <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

        </div>
        <div class="row my-5">
            <div class="col-md-3">
                <h3 class="fs-4 mb-3">Categories List</h3>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-10 ">
                        <form action="category_se.php" method="post">
                            <div class="input-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search..." autocomplete="off" required>
                                <div class="input-group-append">
                                    <input type="submit" name="submit" value="Search" class="btn btn-info " style="background-color: #ef8fa2; border-color: #ef8fa2;">
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
                    <a href="cartegory_add.php">
                        <button type="button" class="btn btn-primary">Add Category</button>
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
                            <th scope="col">Category ID</th>
                            <th scope="col">Name Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($show_cartegory) {
                            $i = 0;
                            while ($result = $show_cartegory->fetch_assoc()) {
                                $i++;

                        ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $result['cartegory_id']; ?></td>
                                    <td><?php echo $result['cartegory_name']; ?></td>
                                    <td><a href="cartegoryedit.php?cartegory_id=<?php echo $result['cartegory_id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href="cartegorydelete.php?cartegory_id=<?php echo $result['cartegory_id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
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
<script type="text/javascript">
    $(document).ready(function() {
        // Send Search Text to the server
        $("#search").keyup(function() {
            let searchText = $(this).val();
            if (searchText != "") {
                $.ajax({
                    url: "category_search.php",
                    method: "post",
                    data: {
                        query: searchText,
                    },
                    success: function(response) {
                        $("#show-list").html(response);
                    },
                });
            } else {
                $("#show-list").html("");
            }
        });
        $(document).on("click", "a", function() {
            $("#search").val($(this).text());
            $("#show-list").html("");
        });
    });
</script>
<!-- /#page-content-wrapper -->
<?php include "footer.php" ?>