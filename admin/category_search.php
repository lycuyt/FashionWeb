
<?php
    include "./database.php";
    include "./class/cartegory_class.php";
    $cartegory = new Cartegory;

    if (isset($_POST['query'])) {
        $inpText = $_POST['query'];
        // echo $inpText;
        $search = $cartegory->search_live($inpText);
        if ($search) {
            while ($result = $search->fetch_assoc()) {
                echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $result['cartegory_name'] . '</a>';
            }
        } else {
        echo '<p class="list-group-item border-1">không tìm thấy</p>';
        }
  }
?>