<?php
// Kết nối đến cơ sở dữ liệu
include "./database.php";
include "./class/product_class.php";

if(isset($_POST['option'])) {
    $option = $_POST['option'];
    $data = array();
    $pro = new Product;
    if ($option == 'danhmuc') {
        $result = $pro->show_pro_ca();
    } else if ($option == 'loaisanpham') {
        $result = $pro->show_pro_bra();
    }

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo json_encode(array('error' => 'Missing option parameter'));
}
?>
