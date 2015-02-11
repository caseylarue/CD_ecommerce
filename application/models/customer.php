<?php

class Customer extends CI_model {

	function create_cart()
	{
		$query = "INSERT INTO cart (created_at) VALUES (NOW())";
		return $this->db->query($query);
	}

	function add_to_cart($item)
	{
		$query = "INSERT INTO cart_products (cart_id, product_id, product_qty, created_at) VALUES (?, ?, ?, NOW())";
		$values = array($item['cart_id'], $item['product_id'], $item['qty']);
		return $this->db->query($query, $values);
	}

	function display_cart($cart_id)
	{
		return $this->db->query("SELECT products.name, cart_products.cart_id,cart_products.product_id, products.description, products.price, SUM(cart_products.product_qty) as qty, SUM(cart_products.product_qty * products.price) as total
		FROM cart_products
		JOIN products ON cart_products.product_id = products.id
		WHERE cart_products.cart_id=$cart_id
		GROUP BY products.id")->result_array();
	}

	function cart_total($cart_id)
	{
		return $this->db->query("SELECT SUM(cart_products.product_qty * products.price) as item_total
		FROM cart_products
		JOIN products ON cart_products.product_id = products.id
		WHERE cart_products.cart_id=$cart_id")->row_array();
	}

	function qty_in_cart($cart_id)
	{
		return $this->db->query("SELECT SUM(product_qty) as total_qty
		FROM cart_products
		WHERE cart_id=$cart_id")->result_array();
	}

	function delete_item($product_id, $cart_id)
	{
		return $this->db->query("DELETE FROM cart_products 
		WHERE cart_id=$cart_id AND product_id=$product_id");
	}

	function submit_order($order)
	{
		$query = "INSERT INTO orders (cart_id, customer_id, shipping_costs, total, status, created_at) VALUES (?,?,?,?,?,NOW())";
		$values = array($order['cart_id'], $order['customer_id'], '8.95', $order['total'], 'in_process');
		return $this->db->query($query, $values);
	}

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

}