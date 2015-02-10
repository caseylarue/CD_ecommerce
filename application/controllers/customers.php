<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('home');
	}

	public function product()
	{
		$this->load->view('product');
	}

	
	public function build_cart()
	{

		if(!empty($this->session->userdata('cart_id')))
		{
			$item = $this->input->post();
			$item['cart_id']= $this->session->userdata('cart_id');
			$cart_id = $this->session->userdata('cart_id');
			$this->load->model('Customer');
			$this->Customer->add_to_cart($item);
			$qty = $this->Customer->qty_in_cart($cart_id);
			$this->session->set_userdata('cart_qty', $qty[0]['total_qty']);
		}
		else 
		{
			$this->load->model('Customer');
			$this->Customer->create_cart();
			$cart_id = $this->db->insert_id();
			$this->session->set_userdata('cart_id', $cart_id);

			$item = $this->input->post();
			$item['cart_id']= $cart_id;
			$this->Customer->add_to_cart($item);
			$qty = $this->Customer->qty_in_cart($cart_id);
			$this->session->set_userdata('cart_qty', $qty[0]['total_qty']);
		}
	}

	public function cart()
	{
		$cart_id = $this->session->userdata('cart_id');
		$this->load->model('Customer');
		$items = $this->Customer->display_cart($cart_id);
		$cart_total = $this->Customer->cart_total($cart_id);
		$this->load->view('cart', array('items' => $items, 'cart_total' => $cart_total));
	}

	public function delete_item($product_id)
	{
		$cart_id = $this->session->userdata('cart_id');
		$this->load->model('Customer');
		$this->Customer->delete_item($product_id, $cart_id);
		$qty = $this->Customer->qty_in_cart($cart_id);
		$this->session->set_userdata('cart_qty', $qty[0]['total_qty']);
		$this->cart();
	}


	public function checkout()
	{
		$result = $this->input->post();
		$this->load->model('Customer');

		// add to customer info to db
		$this->Customer->add_customer($result);
		$result['customer_id'] = $this->db->insert_id();

		// add customer shipping address to db
		$this->Customer->add_shipping($result);

		// add order to db
		$cart_id = $this->session->userdata('cart_id');

		$total = $this->Customer->cart_total($cart_id);
		foreach($total as $value)
		{
			$order['total'] = $value;
		}
		$order['cart_id'] = $this->session->userdata('cart_id');
		$order['customer_id'] = $result['customer_id'];
		$this->Customer->submit_order($order);


	}


}   //end of main controller