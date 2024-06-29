<?php
    include "header.php";

    include "class/product_class.php";
?>
<?php
    $product = new Product;
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];   
        $delete_product =  $product->delete_product($product_id);
    }   
?>
