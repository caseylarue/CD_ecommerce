<?php

class Ecommerce extends CI_Model {

	function add_customer($result)
	{
		$query = "INSERT INTO customers (first_name, last_name, address1, address2, city, state, zipcode, card_type, credit_card_number, security_code, expiration_date, created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW())";
		$values = array($result["billing_first_name"], $result["billing_last_name"], $result["billing_address"], $result["billing_address_2"], $result["billing_city"], $result["billing_state"], $result["billing_zip"], $result["billing_card_type"], $result["billing_card_number"], $result["billing_security_code"], $result["billing_expiration"]);
		return $this->db->query($query, $values);
	}

	function add_shipping($result)
	{
		$query = "INSERT INTO shipping_customers (customer_id, first_name, last_name, address1, address2, city, state, zipcode, created_at) VALUES (?,?,?,?,?,?,?,?,NOW())";
		$values = array($result['customer_id'], $result["shipping_first_name"], $result["shipping_last_name"], $result["shipping_address"], $result["shipping_address_2"], $result["shipping_city"], $result["shipping_state"], $result["shipping_zip"]);
		return $this->db->query($query, $values);
	}

	function add_to_cart($item)
	{
		$query = "INSERT INTO cart_products (cart_id, product_id, product_qty, created_at) VALUES (?, ?, ?, NOW())";
		$values = array($item['cart_id'], $item['product_id'], $item['qty']);
		return $this->db->query($query, $values);
	}

	function cart_total($cart_id)
	{
		return $this->db->query("SELECT SUM(cart_products.product_qty * products.price) as item_total
		FROM cart_products
		JOIN products ON cart_products.product_id = products.id
		WHERE cart_products.cart_id=$cart_id")->row_array();
	}	

	function create_cart()
	{
		$query = "INSERT INTO cart (created_at) VALUES (NOW())";
		return $this->db->query($query);
	}

	function confirm_password($data)
	{
		$query = 'SELECT * FROM admins WHERE email = ?';
		$ret_data = $this->db->query($query, array($data['email']))->row_array();
		
		if ($ret_data['email'] == $data['email'])
		{
			if($ret_data['password'] == $data['password'])
				return true;
			else
				return false;
		}
		else
			return false;
	}

	function delete_item($product_id, $cart_id)
	{
		return $this->db->query("DELETE FROM cart_products 
		WHERE cart_id=$cart_id AND product_id=$product_id");
	}

	function display_cart($cart_id)
	{
		return $this->db->query("SELECT cart_products.cart_id,cart_products.product_id, products.description, products.price, SUM(cart_products.product_qty) as qty, SUM(cart_products.product_qty * products.price) as total
		FROM cart_products
		JOIN products ON cart_products.product_id = products.id
		WHERE cart_products.cart_id=$cart_id
		GROUP BY products.id")->result_array();
	}

	function get_category()
	{
		$query = 'SELECT name, id FROM categories';
		return $this->db->query($query)->result_array();
		// var_dump($res); die();
	}

    public function get_all_category_with_counts(){
        return $this->db->query("SELECT categories.id, categories.name, SUM(products.inventory_count) AS count FROM categories
           JOIN products ON categories.id= products.category_id GROUP BY products.category_id")->result_array();
    }

	public function get_category_id($cat_name)
	{
		$query = 'SELECT id FROM categories WHERE name = ?';
		return $this->db->query($query, array($cat_name))->row_array();
	}

	public function get_images()
    {
        $query = "SELECT url FROM images WHERE main_pic=1";
        return $this->db->query($query)->result_array();
    }

    public function count_images()
    {
    	$query = "SELECT COUNT(images.id) as count_imgs FROM images WHERE main_pic=1";
        return $this->db->query($query)->row_array();
    }

    public function get_images_by_category($category_id){
        return $this->db->query("SELECT images.url, categories.name FROM images JOIN products ON images.product_id = products.id
            JOIN categories ON products.category_id = categories.id 
            WHERE categories.id = ?", array('id' => $category_id))->result_array();
    }

	public function get_product_by_id($product_id)
	{
		$query = 'SELECT products.*, GROUP_CONCAT(images.url) as image_urls, GROUP_CONCAT(images.main_pic) as main_pics FROM products
				 LEFT JOIN images ON images.product_id = products.id
				 WHERE products.id = ?
				 GROUP BY products.id';
		$result = $this->db->query($query, array($product_id))->row_array();
		//var_dump($result); die();
		if(isset($result['images'])) $result['images'] = explode(',',$result['image_urls']);
		if(isset($result['main_pic_flags'])) $result['main_pic_flags'] = explode(',',$result['main_pics']);
		return $result;
	}

	public function get_product_id_from_name($data)
	{
		//var_dump($data);die();
		$query = 'SELECT id FROM products WHERE  name = ?';
		return $this->db->query($query, array($data['name']))->row_array();
	}

	function insert_category($cat_name)
	{
		$query = 'INSERT INTO categories (name, created_at, updated_at) VALUES (?, ?, ?)';
		$values = array($cat_name, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		return $this->db->query($query, $values);
	}

 	
	function insert_product($data){
		// echo 'got into model insert product</br>';
		var_dump($data);
		if (!empty($data['new_category'])){
			$this->insert_category($data['new_category']);
			$result = $this->get_category_id($data['new_category']);
			$data['category']=$result['id'];
			//var_dump($data);die();
		}


		$price = floatval(rand(1,100).'.'.rand(0,99));
		$rating = rand(1,5);
		$pic_url_1 = '../../assets/engineer.jpg';
		$pic_url_2 = '../../assets/engineer.jpg';
		$pic_url_3 = '../../assets/engineer.jpg';
		$inventory_count = rand(100,1000);
		$amount_sold = 0;
		$main_pic = 1;
		$query = 'INSERT INTO products (name, price, rating, inventory_count, amount_sold, description, category_id, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,?)';
		$values = array($data['name'], $price, $rating, $inventory_count, $amount_sold, $data['description'], $data['category'], date("Y-m-d, H:i:s"),date("Y-m-d, H:i:s"));
		return $this->db->query($query, $values);
	}

	function qty_in_cart($cart_id)
	{
		return $this->db->query("SELECT SUM(product_qty) as total_qty
		FROM cart_products
		WHERE cart_id=$cart_id")->result_array();
	}

	function submit_order($order)
	{
		$query = "INSERT INTO orders (cart_id, customer_id, shipping_costs, total, status, created_at) VALUES (?,?,?,?,?,NOW())";
		$values = array($order['cart_id'], $order['customer_id'], '8.95', $order['total'], 'in_process');
		return $this->db->query($query, $values);
	}


}