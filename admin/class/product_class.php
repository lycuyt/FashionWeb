
<?php
class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function show_cartegory()
    {
        $query = "SELECT * FROM tb1_cartegory ORDER BY cartegory_id DESC";
        $result = $this->db->select($query);
        return $result;
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

    public function insert_product(
        $product_name,
        $cartegory_id,
        $brand_id,
        $product_price,
        $product_price_new,
        $product_desc,
        $image,
        $quantity,
        $quantity_sold,
        $image_tmp_name
    ) {
        $query = "SELECT MIN(t1.product_id + 1) AS min_id
              FROM tb1_product AS t1
              LEFT JOIN tb1_product AS t2 ON t1.product_id + 1 = t2.product_id
              WHERE t2.product_id IS NULL";
        $resultA = $this->db->select($query);
        $row = $resultA->fetch_assoc();
        $min_id = $row['min_id'];

        $query = "INSERT INTO tb1_product (product_id, product_name,
            cartegory_id,brand_id,product_price,
            product_price_new,product_desc,product_img, quantity, quantity_sold) 
            VALUES ('$min_id','$product_name', '$cartegory_id', '$brand_id',
            '$product_price','$product_price_new', '$product_desc', '$image', '$quantity', '$quantity_sold' )";
        $result = $this->db->insert($query);
        if ($result) {
            $query = "SELECT * FROM tb1_product ORDER BY product_id DESC LIMIT 1";
            $result = $this->db->select($query)->fetch_assoc();
            $product_id = $result['product_id'];
            $filename = $_FILES['product_img_desc']['name'];
            $file_tmp = $_FILES['product_img_desc']['tmp_name'];
            foreach ($filename as $key => $value) {
                move_uploaded_file($file_tmp[$key], "uploads/" . $value);
                $query = "INSERT INTO tb1_product_img_desc(product_id, product_img_desc)
                    VALUES ('$product_id', '$value')";
                $result = $this->db->insert($query);
            }
        }
        header('location: product.php');
        return $result;
    }
    public function show_brand_ajax($cartegory_id)
    {
        $query = "SELECT * FROM tb1_brand WHERE cartegory_id = '$cartegory_id'";
        $result = $this->db->select($query);
        return $result;
    }


    public function  show_product()
    {
        $query = "SELECT tb1_product.*, tb1_cartegory.cartegory_name , tb1_brand.brand_name 
            FROM tb1_product INNER JOIN tb1_brand ON tb1_product.brand_id = tb1_brand.brand_id
            INNER JOIN tb1_cartegory ON tb1_brand.cartegory_id = tb1_cartegory.cartegory_id 
            ORDER BY tb1_product.product_id DESC";
        $result = $this->db->select($query);

        return $result;
    }
    public function delete_product($product_id)
    {
        $query = "DELETE FROM tb1_product WHERE
            product_id = '$product_id' ";
        $result = $this->db->delete($query);

        $query1 = "DELETE FROM tb1_product_img_desc WHERE
            product_id = '$product_id' ";
        $result1 = $this->db->delete($query1);

        header('location: product.php');
        return $result;
    }
    public function show_img_desc($product_id)
    {
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
    public function update_product(
        $product_name,
        $cartegory_id,
        $brand_id,
        $product_price,
        $product_price_new,
        $product_desc,
        $image,
        $quantity,
        $quantity_sold,
        $product_id
    ) {
        $query = "UPDATE  tb1_product SET product_name = '$product_name',
            cartegory_id = '$cartegory_id', brand_id = '$brand_id',
            product_price = '$product_price', product_price_new = '$product_price_new',
            product_desc = '$product_desc', product_img = '$image',
            quantity = '$quantity', quantity_sold = '$quantity_sold' WHERE
            product_id = '$product_id' ";
        $result = $this->db->update($query);
        // header('location: product.php');
        return $result;
    }
    public function update_product_2(
        $product_name,
        $cartegory_id,
        $brand_id,
        $product_price,
        $product_price_new,
        $product_desc,
        $quantity,
        $quantity_sold,
        $product_id
    ) {
        $query = "UPDATE  tb1_product SET product_name = '$product_name',
            cartegory_id = '$cartegory_id', brand_id = '$brand_id',
            product_price = '$product_price', product_price_new = '$product_price_new',
            product_desc = '$product_desc',
            quantity = '$quantity', quantity_sold = '$quantity_sold' WHERE
            product_id = '$product_id' ";
        $result = $this->db->update($query);
        // header('location: product.php');
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
        foreach ($filename as $key => $value) {
            move_uploaded_file($file_tmp[$key], "uploads/" . $value);
            $query = "INSERT INTO tb1_product_img_desc(product_id, product_img_desc)
                    VALUES ('$product_id', '$value')";
            $result = $this->db->insert($query);
        }
        header('location: product.php');
        return $result;
    }
    public function count_product()
    {
        $query = "SELECT COUNT( * ) AS total FROM tb1_product ";
        $result = $this->db->select($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function show_product_sold()
    {
        $query = "SELECT p.product_img, p.product_name, p.quantity_sold from tb1_product as p
            order by p.quantity DESC LIMIT 3 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product_sold_1()
    {
        $query = "SELECT p.product_img, p.product_name, (p.quantity_sold*p.product_price) as total from tb1_product as p
            order by total DESC LIMIT 3 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product_sold_2()
    {
        $query = "SELECT p.product_img, p.product_name, p.quantity  from tb1_product as p
            WHERE p.quantity <=10 order by p.quantity";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_pro_ca()
    {
        $query = "SELECT c.cartegory_name as name, COUNT(p.product_id) as total FROM tb1_product as p, tb1_cartegory as c
            WHERE c.cartegory_id = p.cartegory_id
            group by c.cartegory_name";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_pro_bra()
    {
        $query = "SELECT c.brand_name as name, COUNT(p.product_id) as total FROM tb1_product as p, tb1_brand as c
            WHERE c.brand_id = p.brand_id
            group by c.brand_name";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_15()
    {
        $query = "SELECT 
            DAY(o.time) AS order_date, 
            SUM(d.quantity * p.product_price) AS daily_revenue
        FROM 
            oder_detail AS d 
        JOIN 
            orders AS o ON o.oder_id = d.oder_id 
        JOIN 
            tb1_product AS p ON d.product_id = p.product_id 
        WHERE 
            o.time >= CURDATE() - INTERVAL 15 DAY AND o.time <= CURDATE()
        GROUP BY 
            DATE(o.time)
        ORDER BY 
            DATE(o.time)";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_30()
    {
        $query = "SELECT 
        DAY(o.time) AS order_date, 
        SUM(d.quantity * p.product_price) AS daily_revenue
        FROM 
        oder_detail AS d 
        JOIN 
        orders AS o ON o.oder_id = d.oder_id 
        JOIN 
        tb1_product AS p ON d.product_id = p.product_id 
         WHERE 
        o.time >= CURDATE() - INTERVAL 30 DAY AND o.time <= CURDATE()
        GROUP BY 
        DATE(o.time)
        ORDER BY 
        DATE(o.time)";
        $result = $this->db->select($query);
        return $result;
    }
}
?>