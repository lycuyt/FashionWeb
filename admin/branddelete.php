<?php
    include "header.php";
    include "class/brand_class.php";
?>
<?php
    $brand = new Brand;
    if(isset($_GET['brand_id'])){
        $brand_id = $_GET['brand_id'];   
        $delete_brand =  $brand->delete_brand($brand_id);
    }   
?>

