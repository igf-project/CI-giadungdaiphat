<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	private $page_title;
	private $page_metakey;
	private $page_metadesc;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Config_model');
		$this->load->model('Menu_model');
		$this->load->model('Product_model');
		$this->load->model('Catalog_model');
		$this->load->library('My_library');
		$this->My_library = new My_library();
	}

	public function index(){}

	public function blog($code)
	{
		$data = array();
		$code = trim($code);
		$order = array('cdate'=>'DESC');
		$where = "code = '".$code."'";
		$result = $this->Catalog_model->getOne($where);
		$data['result'] = $result;
		/* Set Pagging */
		$limit_per_page = 24;
		$uri_segment 	= 3;
		$num_links		= 3;
		$base_url 		= base_url().'/san-pham/'.$code.'/';
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		$total_records 	= $this->Product_model->count_all("cata_id = ".$result['id']);

		if ($total_records > 0)
		{
			$data["links"] = $this->My_library->paging($total_records, $limit_per_page, $uri_segment, $num_links, $base_url);
		}
		/* End Set Pagging */
		if($result['list_child']=="[]"){
			$list_cataID = "";
		}else{
			$trim = trim($result['list_child']);
			$list_cataID = substr($trim, 1, strlen($trim)-2) ;
		}

		/* GET */
		if(isset($_GET['cata']) && $_GET['cata']!=''){
			$list_cataID = (int)$_GET['cata'];
		}
		/* End GET */
		$trim = trim($result['list_child']);
		$ids = substr($trim, 1, strlen($trim)-2);
		$data['list_child_catalog'] = $this->Catalog_model->get_list("id IN (".$ids.")");
		$data["listProduct"] = $this->Product_model->rows("cata_id IN (".$list_cataID.")", $order, $page, $limit_per_page);

		$data['config'] 		= 	$this->Config_model->get_list();
		$data['page_title'] 	= 	$data['result']['name'];
		$data['page_keyword'] 	= 	$data['result']['meta_key'];
		$data['page_descript'] 	= 	$data['result']['meta_desc'];
		$data['page_phone'] 	= 	$data['config']['phone'];
		$data['page_email'] 	= 	$data['config']['email'];
		$data['page_facebook'] 	= 	$data['config']['facebook'];
		$data['page_gplus'] 	= 	$data['config']['gplus'];

		$data['menu']			= 	$this->Menu_model->rows();
		$data['catalog']		= 	$this->Catalog_model->getListCatalog();

		$this->load->view('web/layout/head', $data);
		$this->load->view('web/layout/top_header', $data);
		$this->load->view('web/layout/middle_header', $data);
		$this->load->view('web/layout/nav', $data);
		$this->load->view('web/Catalog_view', $data);
		$this->load->view('web/layout/footer_view', $data);
	}

	public function detail($code)
	{
		$data = array();
		$code = trim($code);
		$data['result']			=	$this->Product_model->getOne("pro_code ='".$code."'");
		$data['group_product']	=	$this->Catalog_model->getOne("id ='".$data['result']['cata_id']."'");
		$data['product_same_group']=	$this->Product_model->get_list("cata_id=".$data['result']['cata_id']." AND id <> '".$data['result']['id']."' LIMIT 0,6");

		$data['config'] 		= 	$this->Config_model->get_list();
		$data['page_title'] 	= 	$data['result']['name'];
		$data['page_keyword'] 	= 	$data['result']['meta_key'];
		$data['page_descript'] 	= 	$data['result']['meta_desc'];
		$data['page_phone'] 	= 	$data['config']['phone'];
		$data['page_email'] 	= 	$data['config']['email'];
		$data['page_facebook'] 	= 	$data['config']['facebook'];
		$data['page_gplus'] 	= 	$data['config']['gplus'];

		$data['menu']			= 	$this->Menu_model->rows();
		$data['catalog']		= 	$this->Catalog_model->getListCatalog();

		$this->load->view('web/layout/head', $data);
		$this->load->view('web/layout/top_header', $data);
		$this->load->view('web/layout/middle_header', $data);
		$this->load->view('web/layout/nav', $data);
		$this->load->view('web/Product_view', $data);
		$this->load->view('web/layout/footer_view', $data);
	}

	public function addCart(){
		// $this->session->unset_userdata('CART');die();
		$id = $this->input->post('id');
		$product_code = $this->input->post('pro_code');
		$quantity = $this->input->post('quantity');
		$data = $this->Product_model->getOne("id = ".$id);

		$item = array(
			'id' => $data['id'],
			'pro_code' => $data['pro_code'],
			'cata_id' => $data['cata_id'],
			'code' => $data['code'],
			'name' => $data['name'],
			'thumb' => $data['thumb'],
			'start_price' => $data['start_price'],
			'sl' => $quantity
		);

		if(!isset($_SESSION['CART'])) $_SESSION['CART'] = array();
		// kiem tra xem gio hang da co san pham vua them
		$n = count($_SESSION['CART']);
		$flag = false;
		if($n>0){
			for($i=0;$i<$n;$i++){
				if($_SESSION['CART'][$i]['pro_code']==$product_code){
					$_SESSION['CART'][$i]['sl'] += $quantity;
					$flag=true; break;
				}
			}
		}
		// them moi
		if($flag==false) $_SESSION['CART'][$n] = $item;
		echo count($_SESSION['CART']);
	}

}
