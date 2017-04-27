<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('kategori_model');
		$this->load->model('model');
	}

	public function index(){
		$kategori = $this->kategori_model->getCategory();
		foreach($kategori as $category){
			$product[$category['category_name']] = $this->kategori_model->getdatabyKategory($category["category_id"]);
		}

		$this->data = array (
			'title'			=> '.:: Halaman Awal ::.',
			'error'			=> '',
			'view'			=> $product,
			'titlesistem'	=> $this->model->getTitle(),
		);
		
		$this->load->view('category/header',$this->data);
		$this->load->view('category/index');
		$this->load->view('category/footer');

	}
}