
<?php
    class Brand{
        private $db;

        public function __construct()
        {
            $this ->db = new Database();
        }

        public function insert_brand($cartegory_id, $brand_name){
        // Lấy ra ID nhỏ nhất chưa được sử dụng trong bảng tb1_brand
            $query = "SELECT MIN(t1.brand_id + 1) AS min_id
            FROM tb1_brand AS t1
            LEFT JOIN tb1_brand AS t2 ON t1.brand_id + 1 = t2.brand_id
            WHERE t2.brand_id IS NULL";
            $result = $this->db->select($query);
            $row = $result->fetch_assoc();
            $min_id = $row['min_id'];

            // Chèn bản ghi mới với ID nhỏ nhất chưa được sử dụng
            $insert_query = "INSERT INTO tb1_brand(brand_id, cartegory_id, brand_name) VALUES ('$min_id', '$cartegory_id', '$brand_name')";
            $insert_result = $this->db->insert($insert_query);

            header('location: brand.php');
            return $insert_result;
        }
        public function show_cartegory()
        {
            $query = "SELECT * FROM tb1_cartegory ORDER BY cartegory_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_brand()
        {
            // $query = "SELECT * FROM tb1_brand ORDER BY brand_id DESC";
            $query = "SELECT tb1_brand.*, tb1_cartegory.cartegory_name FROM tb1_brand
            INNER JOIN tb1_cartegory ON tb1_brand.cartegory_id = tb1_cartegory.cartegory_id
            ORDER BY tb1_brand.brand_id DESC";
            $result = $this->db->select($query);
            return $result;
        } 
        
        public function get_cartegory($cartegory_id)
        {
            $query = "SELECT * FROM tb1_cartegory WHERE cartegory_id = '$cartegory_id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_brand($brand_id)
        {
            $query = "SELECT * FROM tb1_brand WHERE brand_id = '$brand_id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_cartegory($cartegory_name, $cartegory_id){
            $query = "UPDATE  tb1_cartegory SET cartegory_name = '$cartegory_name' WHERE
            cartegory_id = '$cartegory_id' ";
            $result = $this->db->update($query);
            header('location: cartegory_show.php');
            return $result;
        }
        public function update_brand($cartegory_id, $brand_name, $brand_id){
            $query = "UPDATE  tb1_brand SET brand_name = '$brand_name', cartegory_id = '$cartegory_id' WHERE
            brand_id = '$brand_id' ";
            $result = $this->db->update($query);
            header('location: brand.php');
            return $result;
        }
        public function delete_cartegory($cartegory_id){
            $query = "DELETE FROM tb1_cartegory WHERE
            cartegory_id = '$cartegory_id' ";
            $result = $this->db->delete($query);
            header('location: cartegory_show.php');
            return $result;

        }
        public function delete_brand($brand_id){
            $query = "DELETE FROM tb1_brand WHERE
            brand_id = '$brand_id' ";
            $result = $this->db->delete($query);
            header('location: brand.php');
            return $result;

        }
        public function count_brand() 
        {
            $query = "SELECT COUNT( * ) AS total FROM tb1_brand ";
            $result = $this->db->select($query);
            $row = $result->fetch_assoc();
            return $row['total'];
        }
    }
?>