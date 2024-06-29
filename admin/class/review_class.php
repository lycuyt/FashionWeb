
<?php
    class Review{
        private $db;

        public function __construct()
        {
            $this ->db = new Database();
        }

        
        public function show_review()
        {
            $query = "SELECT p.product_name, p.product_img, r.customer, r.review, r.start, r.time FROM reviews as r, tb1_product as p
            WHERE r.product_id = p.product_id
            ORDER BY r.time DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function count_pr() 
        {
            $query = "SELECT COUNT(*) as total from reviews WHERE START >=4";
            $result = $this->db->select($query);
            $row = $result->fetch_assoc();
            $query1 = "SELECT COUNT(*) as tt from reviews ";
            $result1 = $this->db->select($query1);
            $row1 = $result1->fetch_assoc();
            $s1 = $row['total'];
            $s2 = $row1['tt'];
            $re = round($s1 / $s2, 2);
            return $re*100;
        }
        public function count_review() 
        {
            $query = "SELECT COUNT(*) as total FROM reviews ";
            $result = $this->db->select($query);
            $row = $result->fetch_assoc();
            return $row['total'];
        }
        
    }
?>