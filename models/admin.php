<?php

class Admin extends CI_Model {

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

	public function display_invoice($id)
	{
		return $this->db->query("SELECT 
			orders.id as order_id, 
			orders.created_at, 
			shipping_customers.first_name as shipping_first_name,
			shipping_customers.last_name as shipping_last_name,
			shipping_customers.address1 as shipping_address1,
			shipping_customers.address2 as shipping_address2,
			shipping_customers.city as shipping_city,
			shipping_customers.state as shipping_state,
			shipping_customers.zipcode as shipping_zip,
			customers.first_name as first_name,
			customers.last_name as last_name,
			customers.address1 as address1,
			customers.address2 as address2,
			customers.city as city,
			customers.state as state,
			customers.zipcode as zip,
			products.id as product_id,
			products.name as product_name,
			products.price as product_price,
			cart_products.product_qty as product_qty,
			SUM(products.price * cart_products.product_qty) as total,
			orders.total as subtotal,
			orders.shipping_costs as shipping,
			SUM(orders.total + orders.shipping_costs) as total_price
			FROM orders
			JOIN customers on customers.id = orders.customer_id
			JOIN shipping_customers on shipping_customers.customer_id = customers.id
			JOIN cart_products on cart_products.cart_id = orders.cart_id
			JOIN products on products.id = cart_products.product_id
			WHERE orders.id = ?
			GROUP BY orders.id", array($id))->row_array();
	}

	function get_all_products_and_pic()
	{
		$query = 'SELECT products.*, GROUP_CONCAT(images.url) as images, GROUP_CONCAT(images.main_pic) as image_flags FROM products
				  LEFT JOIN images ON products.id = images.product_id
				  GROUP BY products.id';
		$result =  $this->db->query($query)->result_array();
		$i = 0;
		foreach ($result as $data){
			
			if(!empty($data['images'])){
				$images = explode(',', $data['images']);
				$flags = explode(',', $data['image_flags']);

				$j = 0; 

				foreach ($flags as $flag){
					if($flag){
						$result[$i]['image_url'] = $images[$j];
					}
					$j=$j+1;
				}
			}
			$i = $i + 1;
		}
		return $result;
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

	function get_category_id($cat_name)
	{
		$query = 'SELECT id FROM categories WHERE name = ?';
		return $this->db->query($query, array($cat_name))->row_array();
	}

	public function get_images()
    {
        $query = "SELECT url FROM images";
        return $this->db->query($query)->result_array();
    }

    function get_orders()
	{
		return $this->db->query("SELECT orders.id, customers.first_name, customers.last_name, orders.created_at, customers.address1, customers.address2, customers.city, customers.state, customers.zipcode, SUM(orders.total + orders.shipping_costs) as grand_total, orders.status
			FROM orders
			JOIN customers ON orders.customer_id = customers.id
			GROUP BY orders.id
			ORDER BY orders.created_at DESC")->result_array();
	}

    public function get_product_by_category($category_id){
        return $this->db->query("SELECT images.url FROM images JOIN products ON images.product_id = products.id
                                    JOIN categories ON products.category_id = categories.id 
                                    WHERE categories.id = ?", array('id' => $category_id))->result_array();
    }


	function get_product_by_id($product_id)
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

	function get_product_id_from_name($data)
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

    function insert_image_url($product_id, $url, $main_pic_flag){
    	//echo 'got into insert image url';
    	//var_dump($data);

    	$pos = stripos($url, '//');
    	$len = strlen($url);
    	$url = substr($url, $pos+2);

    	
    	$query = 'INSERT INTO images (url, main_pic, created_at, updated_at, product_id) VALUES (?, ?, ?, ?, ?)';
		$values = array($url, $main_pic_flag, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $product_id);
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
		$inventory_count = rand(100,1000);
		$amount_sold = 0;
		$main_pic = 1;
		$query = 'INSERT INTO products (name, price, rating, inventory_count, amount_sold, description, category_id, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,?)';
		$values = array($data['name'], $price, $rating, $inventory_count, $amount_sold, $data['description'], $data['category'], date("Y-m-d, H:i:s"),date("Y-m-d, H:i:s"));
		return $this->db->query($query, $values);
	}

	public function invoice_details($id)
	{
		return $this->db->query("SELECT 
			cart_products.cart_id as cart_id,
			orders.id as order_id, 
			orders.status as order_status,
			products.id as product_id,
			products.name as product_name,
			products.price as product_price,
			cart_products.product_qty as product_qty,
			SUM(products.price * cart_products.product_qty) as product_total
			FROM orders
			JOIN cart_products on cart_products.cart_id = orders.cart_id
			JOIN products on products.id = cart_products.product_id
			WHERE orders.id = ?
			GROUP BY products.id", array($id))->result_array();
	}

}