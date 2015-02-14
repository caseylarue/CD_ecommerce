<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler();
		$this->load->model('Ecommerce');
	}

		public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('home');
	}

	public function catalog()
	{
		$this->get_partial_catalog(null);
		
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
			redirect('/customers/product');
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
			redirect('/customers/product');
		}
	}

	public function buy(){
		echo "Thank you for buying!";
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

	public function get_product($category_id){	
		$this->get_partial_catalog($category_id);
	}

	private function get_partial_catalog($category_id)
	{
		if($category_id != null)
		{
			$result1 = $this->Ecommerce->get_images_by_category($category_id);
			$category = 1;
		}
		else{
			$result1= $this->Ecommerce->get_images();
			$category = 0;
		}
		$result2 = $this->Ecommerce->get_all_category_with_counts();	
		$count_imgs = $this->Ecommerce->count_images();	
		$array = array(
					'types' => $result2,
					'imgs' => $result1,
					'category' => $category,
					'count_imgs' => $count_imgs
					);
		$this->load->view('catalog', $array);
	}
	
	

	public function search_product(){
		$product = $this->input->post('search');
		$category = $this->Ecommerce->get_category();
		for($i=0; $i < count($category); $i++){
			foreach(array($category[$i]) as $value){
				if($value['name'] == $product){
					echo "found!";
				}else{
					echo "item not found!";
				}

			}
		}
	}

	public function pages($page)
	{
		$start_pic = ($page-1)*20+1;
		$end_pic = $start_pic+20;
		// select imgs from db from img id 21 through 41
	}


}   //end of main controller


//end of main controller