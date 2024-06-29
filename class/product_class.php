<?php 
?>
<?php
    class Product{
        private $db;

        public function __construct()
        {
            $this ->db = new Database();
        }

        public function show_brand($cartegory_id)
        {
            $query = "SELECT tb1_brand.*, tb1_cartegory.cartegory_name FROM tb1_brand
            INNER JOIN tb1_cartegory ON tb1_brand.cartegory_id = tb1_cartegory.cartegory_id
            WHERE tb1_brand.cartegory_id = '$cartegory_id'
            ORDER BY tb1_brand.brand_id DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function  show_product(){
            $query = "SELECT tb1_product.*, tb1_cartegory.cartegory_name , tb1_brand.brand_name 
            FROM tb1_product INNER JOIN tb1_brand ON tb1_product.brand_id = tb1_brand.brand_id
            INNER JOIN tb1_cartegory ON tb1_brand.cartegory_id = tb1_cartegory.cartegory_id 
            ORDER BY tb1_product.product_id DESC";
            $result = $this->db->select($query);
            
            return $result;
        }
        //lay ra 4 san pham co danh muc la nu
        public function  show_product1($cartegory_name){
            $query = "SELECT tb1_product.*, tb1_cartegory.cartegory_name , tb1_brand.brand_name 
            FROM tb1_product INNER JOIN tb1_brand ON tb1_product.brand_id = tb1_brand.brand_id
            INNER JOIN tb1_cartegory ON tb1_brand.cartegory_id = tb1_cartegory.cartegory_id 
            WHERE tb1_cartegory.cartegory_name = '$cartegory_name'
            ORDER BY tb1_product.product_id DESC 
            LIMIT 4";
            $result = $this->db->select($query);
            
            return $result;
        }
        // lay san pham theo danh muc
        public function show_product2($category_name, $products_per_page, $offset) {
            $sql = "SELECT tb1_product.*, tb1_cartegory.cartegory_name, tb1_brand.brand_name 
            FROM tb1_product 
            INNER JOIN tb1_brand ON tb1_product.brand_id = tb1_brand.brand_id
            INNER JOIN tb1_cartegory ON tb1_brand.cartegory_id = tb1_cartegory.cartegory_id 
            WHERE tb1_cartegory.cartegory_name = '$category_name'
            ORDER BY tb1_product.product_id DESC 
            LIMIT $products_per_page OFFSET $offset";
            $result = $this->db->select($sql);
            
            return $result;
        }
        // lay ra san pham voi ma id tuong ung
        public function show_product3($product_id) {
            $sql = "SELECT tb1_product.*, tb1_cartegory.cartegory_name, tb1_brand.brand_name 
            FROM tb1_product 
            INNER JOIN tb1_brand ON tb1_product.brand_id = tb1_brand.brand_id
            INNER JOIN tb1_cartegory ON tb1_brand.cartegory_id = tb1_cartegory.cartegory_id 
            WHERE tb1_product.product_id = '$product_id'
            ORDER BY tb1_product.product_id DESC
            ";
            $result = $this->db->select($sql);
            
            return $result;
        }
        public function count_products($category_name) {
            $query = "SELECT COUNT(*) AS total FROM tb1_product 
                      INNER JOIN tb1_brand ON tb1_product.brand_id = tb1_brand.brand_id
                      INNER JOIN tb1_cartegory ON tb1_brand.cartegory_id = tb1_cartegory.cartegory_id 
                      WHERE tb1_cartegory.cartegory_name = '$category_name'";
            $result = $this->db->select($query);
            $row = $result->fetch_assoc();
            return $row['total'];
        }
        public function show_img_desc($product_id){
            //in ra nhung anh mo ta co product id 
            $query = "SELECT  tb1_product_img_desc.product_img_desc FROM tb1_product_img_desc 
            WHERE tb1_product_img_desc.product_id = '$product_id'";    
            $result = $this->db->select($query);
            return $result;
        }
        public function get_product($product_id)
        {
            $query = "SELECT * FROM tb1_product WHERE tb1_product.product_id = '$product_id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product( $product_name,
        $cartegory_id, $brand_id, $product_price, $product_price_new,
        $product_desc,$image,$product_id)
        {
            $query = "UPDATE  tb1_product SET product_name = '$product_name',
            cartegory_id = '$cartegory_id', brand_id = '$brand_id',
            product_price = '$product_price', product_price_new = '$product_price_new',
            product_desc = '$product_desc', product_img = '$image' WHERE
            product_id = '$product_id' ";
            $result = $this->db->update($query);
            // header('location: product_show.php');
            return $result;
        }
        public function update_product_2( $product_name,
        $cartegory_id, $brand_id, $product_price, $product_price_new,
        $product_desc,$product_id)
        {
            $query = "UPDATE  tb1_product SET product_name = '$product_name',
            cartegory_id = '$cartegory_id', brand_id = '$brand_id',
            product_price = '$product_price', product_price_new = '$product_price_new',
            product_desc = '$product_desc' WHERE
            product_id = '$product_id' ";
            $result = $this->db->update($query);
            // header('location: product_show.php');
            return $result;
        }
        public function delete_img_desc($product_id)
        {
            $query = "DELETE FROM tb1_product_img_desc WHERE
            product_id = '$product_id' ";
            $result = $this->db->delete($query);
            return $result;

        }
        public function update_img_desc($filename, $file_tmp,  $product_id)
        {
            foreach($filename as $key => $value)
                {
                    move_uploaded_file($file_tmp[$key], "uploads/".$value);
                    $query = "INSERT INTO tb1_product_img_desc(product_id, product_img_desc)
                    VALUES ('$product_id', '$value')";
                    $result = $this->db->insert($query);
                }   
                header('location: product_show.php');
                return $result;
        }
        





        // public function insert_brand($cartegory_id, $brand_name){
             
        //     $query = "INSERT INTO tb1_brand(cartegory_id,brand_name) VALUES ('$cartegory_id', ' $brand_name')";     
        //     $result = $this->db->insert($query);
        //     header('location: brand_show.php');
        //     return $result;
        // }
        // public function get_brand($brand_id)
        // {
        //     $query = "SELECT * FROM tb1_brand WHERE brand_id = '$brand_id' ";
        //     $result = $this->db->select($query);
        //     return $result;
        // }
        
        // public function update_brand($cartegory_id, $brand_name, $brand_id){
        //     $query = "UPDATE  tb1_brand SET brand_name = '$brand_name', cartegory_id = '$cartegory_id' WHERE
        //     brand_id = '$brand_id' ";
        //     $result = $this->db->update($query);
        //     header('location: brand_show.php');
        //     return $result;
        // }
        // public function delete_cartegory($cartegory_id){
        //     $query = "DELETE FROM tb1_cartegory WHERE
        //     cartegory_id = '$cartegory_id' ";
        //     $result = $this->db->delete($query);
        //     header('location: cartegory_show.php');
        //     return $result;

        // }
        // public function delete_brand($brand_id){
        //     $query = "DELETE FROM tb1_brand WHERE
        //     brand_id = '$brand_id' ";
        //     $result = $this->db->delete($query);
        //     header('location: brand_show.php');
        //     return $result;

        // }
    }
?>