
<?php
    class Order{
        private $db;

        public function __construct()
        {
            $this ->db = new Database();
        }

        
        public function show_orders()
        {
            $query = "SELECT * from orders 
            ORDER BY orders.time DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function search_order($start, $end)
        {
            $query = "SELECT * FROM orders 
            WHERE time >= STR_TO_DATE('$start', '%d/%m/%Y') 
            AND time <= STR_TO_DATE('$end', '%d/%m/%Y')";
            $result = $this->db->select($query);
            return $result;
        }
        public function count_order() 
        {
            $query = "SELECT COUNT( * ) AS total FROM orders ";
            $result = $this->db->select($query);
            $row = $result->fetch_assoc();
            return $row['total'];
        }
    }
?>