<?php 
    // include "database.php";
?>
<!-- chuyen database sang tat ca cac trang php trong admin -->
<?php
    class Cartegory{
        private $db;

        public function __construct()
        {
            $this ->db = new Database();
        }


        public function show_cartegory()
        {
            $query = "SELECT * FROM tb1_cartegory ORDER BY cartegory_id ";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_cartegory($cartegory_id)
        {
            $query = "SELECT * FROM tb1_cartegory WHERE cartegory_id = '$cartegory_id' ";
            $result = $this->db->select($query);
            return $result;
        }
        
    }
?>