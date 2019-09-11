<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	private $page_title;
	private $page_metakey;
	private $page_metadesc;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Config_model');
		$this->load->model('Home_model');
		$this->load->model('Menu_model');
		$this->load->model('Catalog_model');
		$this->load->model('Product_model');
	}

	public function index()
	{
		$data = array();
		$data['config'] 		= 	$this->Config_model->get_list();
		$data['page_title'] 	= 	$data['config']['title'];
		$data['page_keyword'] 	= 	$data['config']['meta_keyword'];
		$data['page_descript'] 	= 	$data['config']['meta_descript'];
		$data['page_phone'] 	= 	$data['config']['phone'];
		$data['page_email'] 	= 	$data['config']['email'];
		$data['page_facebook'] 	= 	$data['config']['facebook'];
		$data['page_gplus'] 	= 	$data['config']['gplus'];

		$data['menu']			= 	$this->Menu_model->rows();
		$data['catalog']		= 	$this->Catalog_model->getListCatalog();
		$data['products']		= $this->Product_model->get_list("isactive = '1' LIMIT 0,35");

		$this->load->view('web/layout/head', $data);
		$this->load->view('web/layout/top_header');
		$this->load->view('web/layout/middle_header', $data);
		$this->load->view('web/layout/nav', $data);
		$this->load->view('web/Contact_view', $data);
		$this->load->view('web/layout/footer_view', $data);
	}

	public function submit_contact()
	{
		$data = array();
		$data['config'] 		= 	$this->Config_model->get_list();
		$data['page_title'] 	= 	$data['config']['title'];
		$data['page_keyword'] 	= 	$data['config']['meta_keyword'];
		$data['page_descript'] 	= 	$data['config']['meta_descript'];
		$data['page_phone'] 	= 	$data['config']['phone'];
		$data['page_email'] 	= 	$data['config']['email'];
		$data['page_facebook'] 	= 	$data['config']['facebook'];
		$data['page_gplus'] 	= 	$data['config']['gplus'];

		$name = $this->input->post('contact_sur_name');
		$email = $this->input->post('contact_email');
		$title = $this->input->post('contact_subject');
		$content = $this->input->post('contact_content');

		// $config = array(
		// 	'protocol' => 'smtp',
		// 	'smtp_host' => 'ssl://ssmtp.gmail.com',
		// 	'smtp_port' => '456',
		// 	'smtp_user' => 'tranviethiepdz@gmail.com',
		// 	'smtp_pass' => '05091994',
		// 	'mailtype' => 'html',
		// 	'charset' => 'iso-8859-1',
		// 	'wordwrap' => TRUE
		// );   

		// $this->email->initialize($config);

		// $this->email->from('tranviethiepdz@gmail.com', $name);
		// $this->email->to('tranviethiepdz@gmail.com'); 


		// $this->email->subject('Email Test');

		// $this->email->message('Testing the email class.');  

		// $this->email->send();

		// echo $this->email->print_debugger();
		$this->sendemail();

		$data['menu'] = $this->Menu_model->rows();
		$this->load->view('web/layout/head', $data);
		$this->load->view('web/layout/top_header', $data);
		$this->load->view('web/layout/nav', $data);
		$this->load->view('web/Submit_contact_view', $data);
		$this->load->view('web/layout/footer_view', $data);
	}

	public function sendemail(){
		$config = Array( 
			'protocol' => 'smtp', 
			'smtp_host' => 'ssl://smtp.googlemail.com', 
			'smtp_port' => 465, 
			'smtp_user' => 'tranviethiepdz@gmail.com', 
			'smtp_pass' => '05091994'
		); 

		$this->load->library('email', $config); 
		$this->email->set_newline("\r\n");
		$this->email->from('tranviethiepdz@gmail.com', 'Name');
		$this->email->to('tranviethiepdz@yahoo.com');
		$this->email->subject(' My mail through codeigniter from localhost '); 
		$this->email->message('Hello World…');
		if (!$this->email->send()) {
			show_error($this->email->print_debugger()); 
		}
		else {
			echo 'Your e-mail has been sent!';
		}
	}   
}
