

<?php
    class Cartegory{
        private $db;

        public function __construct()
        {
            $this ->db = new Database();
        }


        public function insert_cartegory($cartegory_name){
            $query = "SELECT MIN(t1.cartegory_id + 1) AS min_id
                FROM tb1_cartegory AS t1
                LEFT JOIN tb1_cartegory AS t2 ON t1.cartegory_id + 1 = t2.cartegory_id
                WHERE t2.cartegory_id IS NULL";
            $result = $this->db->select($query);
            $row = $result->fetch_assoc();
            $min_id = $row['min_id'];
            
            $insert_query = "INSERT INTO tb1_cartegory(cartegory_id, cartegory_name) VALUES ('$min_id', '$cartegory_name')";
            $insert_result = $this->db->insert($insert_query);

            header('location: category.php');
            // return $insert_result;
        }
        public function show_cartegory()
        {
            $query = "SELECT * FROM tb1_cartegory ORDER BY cartegory_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_cartegory($cartegory_id)
        {
            $query = "SELECT * FROM tb1_cartegory WHERE cartegory_id = '$cartegory_id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_cartegory($cartegory_name, $cartegory_id){
            $query = "UPDATE  tb1_cartegory SET cartegory_name = '$cartegory_name' WHERE
            cartegory_id = '$cartegory_id' ";
            $result = $this->db->update($query);
            header('location: category.php');
            return $result;
        }
        public function delete_cartegory($cartegory_id){
            $query = "DELETE FROM tb1_cartegory WHERE
            cartegory_id = '$cartegory_id' ";
            $result = $this->db->delete($query);
            header('location: category.php');
            return $result;

        }
        public function count_category() 
        {
            $query = "SELECT COUNT( * ) AS total FROM tb1_cartegory ORDER BY cartegory_id DESC";
            $result = $this->db->select($query);
            $row = $result->fetch_assoc();
            return $row['total'];
        }
        public function search_live($search)
        {
            $query = "SELECT * FROM tb1_cartegory WHERE cartegory_name LIKE '%$search%' ";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>