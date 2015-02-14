<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin');
		$this->load->helper(array('form', 'url'));

		$config = array(
			'upload_path' => './assets/images',
			'allowed_types'=> 'gif|jpg|png|jpeg',
			'overwrite' =>TRUE,
			);
		$this->load->library('upload', $config);

		$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function add_new()
	{   $data['product']= array('function' =>'add_new');
		$data['product']['category'] = $this->Admin->get_category();
		$this->load->view('edit_product', $data);
	}

	public function cancel()
	{
		$this->close();
	}

	public function close()
	{
		$this->load->view('product_dashboard');
	}

	public function delete($file_index)
	{
		echo 'got into delete method'.$file_index;
		var_dump($_FILES);
	}

	public function do_upload($data)
	{
	
		$i = 0;

        foreach ($_FILES AS $file){
        	if (!empty($file['name'])){

				$target_dir = ".\assets\images\\";
				$target_file = $target_dir . basename($file['name']);

				$res=move_uploaded_file($file["tmp_name"],$target_file);
				if(!$res){
					$error=array('error'=>'failed to upload file');
					$this->session->set_flashdata('errors',$error);
				}

				//need to take into account that only the index of the checkbox that has been
				//selected will be set
				if (isset($data['main_pic'][$i]))
				{
					$main_pic = 1;
				}else{
					$main_pic = 0;
				}
				$this->Admin->insert_image_url($data['product_id'], $target_file, $main_pic);
			}
			$i = $i + 1;
		}

		return 1;

	}

	public function edit($product_id)
	{
		$data['product'] = $this->Admin->get_product_by_id($product_id);
		$data['product']['category'] = $this->Admin->get_category();
		$data['product']['function'] = 'edit';
		$this->load->view('edit_product', $data);
	}

	public function insert_product()
	{
		//echo 'got into insert product';
		$this->Admin->insert_product($this->input->post());
		$product_id= $this->Admin->get_product_id_from_name($this->input->post());
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

		if($this->Admin->confirm_password($this->input->post()))
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
	
		if ((!empty($this->input->post('upload'))) && (isset($_FILES)))
		{
			$res = $this->do_upload($this->input->post());
		}

		$this->edit($this->input->post('product_id'));
	}

	private function load_order_data()
	{
		$this->load->model('Admin');
		$orders = $this->Admin->get_orders();
		$this->load->view('partial_view_orders_table', array('orders' => $orders));
	}

	private function load_product_data()
	{
		$data['products'] = $this->Admin->get_all_products_and_pic();
		$this->load->view('partial_view_products_table',$data);
	}


}

//end of main controllers