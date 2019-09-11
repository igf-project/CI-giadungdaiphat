<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['slider']			= 	$this->Home_model->get_slide();
		$data['products']		= 	$this->Product_model->get_list("isactive = '1' ORDER BY cdate DESC LIMIT 0,35");

		$this->load->view('web/layout/head', $data);
		$this->load->view('web/layout/top_header', $data);
		$this->load->view('web/layout/middle_header', $data);
		$this->load->view('web/layout/nav', $data);
		$this->load->view('web/main_slide_view', $data);
		$this->load->view('web/home_view', $data);
		$this->load->view('web/layout/footer_view', $data);
	}

	public function subscribe(){
		$this->load->view('web/layout/header_view');
		$email 	= isset($_POST['register_email']) ? $_POST['register_email'] : '';
		if($email!=''){
			$data['register_email'] = $this->Home_model->update_subscribe($email);
			// if($result){
			
			// }
		}
		$this->load->view('web/layout/footer_view');
	}
}
