<?php
    include "header.php";
    include "class/cartegory_class.php";
?>
<?php
    $cartegory = new Cartegory;
    if(isset($_GET['cartegory_id'])){
        $cartegory_id = $_GET['cartegory_id'];   
        $delete_cartegory =  $cartegory->delete_cartegory($cartegory_id);
    }   
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Them danh muc</h1>
                <form action="" method="post">
                    <input required name="cartegory_name" type="text" placeholder="Nhap ten danh muc" 
                    value="<?php echo $result['cartegory_name'] ?>">
                    <button name="btn_Them" type="submit">Them</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

