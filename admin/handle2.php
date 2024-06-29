<?php
// Kết nối đến cơ sở dữ liệu
include "./database.php";
include "./class/product_class.php";

// Kiểm tra xem yêu cầu Ajax có tồn tại không
if(isset($_POST['option'])) {
    $option = $_POST['option'];
    $data1 = array();

    // Tạo đối tượng Product
    $pro = new Product;

    // Lấy dữ liệu từ cơ sở dữ liệu dựa trên lựa chọn của người dùng
    if ($option == '15') {
        $result = $pro->show_15();
    } else if ($option == '30') {
        $result = $pro->show_30();
    }

    // Đưa dữ liệu vào mảng
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data1[] = $row;
        }
    }

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($data1);
} else {
    // Trường hợp không có yêu cầu, trả về thông báo lỗi
    echo json_encode(array('error' => 'Missing option parameter'));
}
?>
