<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ecommerce');
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function add_new()
	{   $data['product']= array('function' =>'add_new');
		$data['product']['category'] = $this->Ecommerce->get_category();
		$this->load->view('edit_product', $data);
	}

	public function cancel()
	{
		echo 'got into cancel method';
		//reset values
	}

	public function close()
	{
		$this->load->view('product_dashboard');
	}

	public function delete()
	{
		echo 'got into delete method';
	}

	public function do_upload()
	{
		if (!$this->upload->do_upload()){
			$error=array('error'=>$this->upload->display_errors());
			$this->session->set_flashdata('errors',$error);
		}

	}

	public function edit($product_id)
	{
		$data['product'] = $this->Ecommerce->get_product_by_id($product_id);
		$data['product']['category'] = $this->Ecommerce->get_category();
		$data['product']['function'] = 'edit';
		$this->load->view('edit_product', $data);
	}

	public function insert_product()
	{
		//echo 'got into insert product';
		$this->Ecommerce->insert_product($this->input->post());
		$product_id= $this->Ecommerce->get_product_id_from_name($this->input->post());
		$this->edit($product_id['id']);

	}

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email','trim|valid_email|required' );
		$this->form_validation->set_rules('password', 'Password','trim|required' );
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('errors',validation_errors());
			redirect('/admins/index');
		}

		if($this->Ecommerce->confirm_password($this->input->post()))
		{
			$this->load->view('order_dashboard');
			$this->load_order_data();
		}
		else
		{
			$this->session->set_flashdata('errors','Email and/or password invalid');
			redirect('/admins/index');
		}
		
	}

	public function next()
	{
		echo 'got into next method';
	}

	public function order_dashboard()
	{
		$this->load->view('order_dashboard');
		$this->load_order_data();
	}

	public function pagination()
	{
		echo 'got into pagination method';
	}

	public function preview()
	{
		$this->load->view('product');
	}
	public function previous()
	{
		echo 'got into previous function';
	}

	public function products()
	{
		$this->load->view('product_dashboard');
		$this->load_product_data();
	}

	public function show_order($id)
	{
		$this->load->model('Admin');
		$order = $this->Admin->display_invoice($id);
		$items = $this->Admin->invoice_details($id);
		$this->load->view('show_order', array('order' => $order, 'items' => $items));
	}

	public function update_product()
	{
		echo 'got into update method';
		var_dump($this->input->post());
	}

	private function load_order_data()
	{
		$this->load->model('Admin');
		$orders = $this->Admin->get_orders();
		$this->load->view('partial_view_orders_table', array('orders' => $orders));
	}

	private function load_product_data()
	{
		//run query to get all product data
		$this->load->view('partial_view_products_table');
	}


}

//end of main controllers