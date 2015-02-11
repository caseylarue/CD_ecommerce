<?php

class Admin extends CI_model {

	function get_orders()
	{
		return $this->db->query("SELECT orders.id, customers.first_name, customers.last_name, orders.created_at, customers.address1, customers.address2, customers.city, customers.state, customers.zipcode, SUM(orders.total + orders.shipping_costs) as grand_total, orders.status
			FROM orders
			JOIN customers ON orders.customer_id = customers.id
			GROUP BY orders.id
			ORDER BY orders.created_at DESC")->result_array();
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