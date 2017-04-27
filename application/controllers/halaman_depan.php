<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Halaman_depan extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('model');
	}

	function index()
	{
		//$view = $this->model->selectdata('data_produk_rating INNER JOIN data_product  ON data_produk_rating.id_product=data_product.product_id LEFT JOIN data_category ON data_product.category_id=data_category.category_id')->result_array();

		$this->load->library('pagination');

		$view= $this->model->selectdata('data_category pr
				JOIN data_product p ON p.category_id = pr.category_id
				JOIN data_produk_rating c ON p.product_id = c.id_product
				WHERE pr.category_id IN
				(
				  SELECT pr.category_id FROM data_category pr WHERE pr.category_id = 1
				)
				ORDER BY pr.category_id')->result_array();

		$data = array (
			'title'			=> '.:: Halaman Awal ::.',
			'error'			=> '',
			'view'			=> $view,
			'titlesistem'	=> $this->model->getTitle(),
		);

		$this->load->view('front/header',$data);
		$this->load->view('front/index');
		$this->load->view('front/footer');
	}

	function petunjuk()
	{

		$data = array (
			'title'			=> '.:: Petunjuk Penggunaan App TA ::.',
			'error'			=> '',
			'petunjuk'		=> $this->model->getPetunjuk(),
			'titlesistem'	=> $this->model->getTitle(),
		);
		
		$this->load->view('front/header',$data);
		$this->load->view('front/petunjuk_penggunaan');
		$this->load->view('front/footer');
	}

	function tentang(){

		$data = array (
			'title'			=> '.:: Tentang App TA ::.',
			'error'			=> '',
			'tentang'		=> $this->model->getTentang(),
			'titlesistem'	=> $this->model->getTitle(),
		);
		$this->load->view('front/header',$data);
		$this->load->view('front/tentang');
		$this->load->view('front/footer');
	}

	function auth()
	{
		if($_POST)
		{
			$this->load->library('form_validation');
	        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
	        $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
   
   			if($this->form_validation->run() == FALSE){
				redirect('');
			}

			$username	= $this->input->post('username');
			$password	= $this->encrypt->sha1($this->input->post('password'));
			$level		= $this->input->post('level');

			$temp		= $this->model->login("where username = '$username' and password = '$password' 
							and level = '$level'")->result_array();

			if($temp != NULL)
			{
				$data = array(
					'id'		=> $temp[0]['id_user'],
					'nama'		=> $temp[0]['nama'],
					'username'	=> $temp[0]['username'],
					'password'	=> $temp[0]['password'],
					'level'		=> $temp[0]['level'],
				);

				$this->session->set_userdata('login',$data);

				if($data["level"] == "1")
				{
					redirect("administrasi/dashboard");
				}

				elseif($data["level"] == "2")
				{
					redirect("pimpinan/dashboard");
				}

				else {
					echo "ERROR! 404 Tidak Ada";
				}
			}

			else
			{
				$error = '
					<div class="alert alert-danger alert-dismissable fade in">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <strong>Kesalahan!</strong> Silahkan cek kembali username, password dan level anda.
					</div>
				';
				
				$this->session->set_flashdata('error', $error);
				redirect('');

			}
		}

		else 
		{
			redirect("");
		}
	}

	function view_produk_books()
	{
		
		$view_produk_books = $this->model->selectdata('data_category pr
			JOIN data_product p ON p.`category_id` = pr.`category_id`
			JOIN data_produk_rating c ON p.`product_id` = c.`id_product`
			WHERE pr.`category_id` IN
			(
			  SELECT pr.`category_id` FROM data_category pr WHERE pr.`category_id` = 1
			)
			ORDER BY pr.`category_id`')->result_array();

		$data= array(
			'title'				=> '.:: Data Buku ::. ',
			'view_produk_books'	=> $view_produk_books,
			'titlesistem'		=> $this->model->getTitle(),
		);
			
		$this->load->view('front/header',$data);
		$this->load->view('front/view_produk_books');
		$this->load->view('front/footer');
	}

	function view_produk_books_form ($id = '')
	{
		$view_produk_books_form = $this->model->selectdata('data_product where product_id = "'.$id.'"')->result_array();

		$data = array(
			'title'				=> '.:: Data Detail Buku ::. ',
			'view_produk_books_form'	=> $view_produk_books_form,
			'titlesistem'		=> $this->model->getTitle(),
		);
			
		$this->load->view('front/header',$data);
		$this->load->view('front/view_produk_books_form');
		$this->load->view('front/footer');
	}

	function view_produk_electronics()
	{
		
		$view_produk_electronics = $this->model->selectdata('data_category pr
			JOIN data_product p ON p.`category_id` = pr.`category_id`
			JOIN data_produk_rating c ON p.`product_id` = c.`id_product`
			WHERE pr.`category_id` IN
			(
			  SELECT pr.`category_id` FROM data_category pr WHERE pr.`category_id` = 2
			)
			ORDER BY pr.`category_id`')->result_array();

		$data = array(
			'title'				=> '.:: Data Produk Elektronik ::. ',
			'view_produk_electronics'	=> $view_produk_electronics,
			'titlesistem'		=> $this->model->getTitle(),
		);
			
		$this->load->view('front/header',$data);
		$this->load->view('front/view_produk_electronics');
		$this->load->view('front/footer');
	}

		function view_electronics()
	{
		
		$view_electronics = $this->model->selectdata('data_category pr
			JOIN data_product p ON p.`category_id` = pr.`category_id`
			JOIN data_produk_rating c ON p.`product_id` = c.`id_product`
			WHERE pr.`category_id` IN
			(
			  SELECT pr.`category_id` FROM data_category pr WHERE pr.`category_id` = 2
			)
			ORDER BY pr.`category_id`')->result_array();

		$data = array(
			'title'				=> '.:: Data Produk Elektronik ::. ',
			'view_electronics'	=> $view_electronics,
			'titlesistem'		=> $this->model->getTitle(),
		);
			
		$this->load->view('front/header',$data);
		$this->load->view('front/view_electronics');
		$this->load->view('front/footer');
	}

	function view_produk_movie()
	{
		
		$view_produk_movie = $this->model->selectdata('data_category pr
			JOIN data_product p ON p.`category_id` = pr.`category_id`
			JOIN data_produk_rating c ON p.`product_id` = c.`id_product`
			WHERE pr.`category_id` IN
			(
			  SELECT pr.`category_id` FROM data_category pr WHERE pr.`category_id` = 3
			)
			ORDER BY pr.`category_id`')->result_array();

		$data = array(
			'title'				=> '.:: Data Produk Movies & TV ::. ',
			'view_produk_movie'	=> $view_produk_movie,
			'titlesistem'		=> $this->model->getTitle(),
		);
			
		$this->load->view('front/header',$data);
		$this->load->view('front/view_produk_movie');
		$this->load->view('front/footer');
	}

	function view_movie()
	{
		
		$view_movie = $this->model->selectdata('data_category pr
			JOIN data_product p ON p.`category_id` = pr.`category_id`
			JOIN data_produk_rating c ON p.`product_id` = c.`id_product`
			WHERE pr.`category_id` IN
			(
			  SELECT pr.`category_id` FROM data_category pr WHERE pr.`category_id` = 3
			)
			ORDER BY pr.`category_id`')->result_array();

		$data = array(
			'title'				=> '.:: Data Produk Movies & TV ::. ',
			'view_movie'	=> $view_movie,
			'titlesistem'		=> $this->model->getTitle(),
		);
			
		$this->load->view('front/header',$data);
		$this->load->view('front/view_movie');
		$this->load->view('front/footer');
	}

	function view_produk_automotive()
	{
		
		$view_produk_automotive = $this->model->selectdata('data_category pr
			JOIN data_product p ON p.`category_id` = pr.`category_id`
			JOIN data_produk_rating c ON p.`product_id` = c.`id_product`
			WHERE pr.`category_id` IN
			(
			  SELECT pr.`category_id` FROM data_category pr WHERE pr.`category_id` = 4
			)
			ORDER BY pr.`category_id`')->result_array();

		$data = array(
			'title'				=> '.:: Data Produk Automotive ::. ',
			'view_produk_automotive'	=> $view_produk_automotive,
			'titlesistem'		=> $this->model->getTitle(),
		);
			
		$this->load->view('front/header',$data);
		$this->load->view('front/view_produk_automotive');
		$this->load->view('front/footer');
	}

	function view_automotive()
	{
		
		$view_automotive = $this->model->selectdata('data_category pr
			JOIN data_product p ON p.`category_id` = pr.`category_id`
			JOIN data_produk_rating c ON p.`product_id` = c.`id_product`
			WHERE pr.`category_id` IN
			(
			  SELECT pr.`category_id` FROM data_category pr WHERE pr.`category_id` = 4
			)
			ORDER BY pr.`category_id`')->result_array();

		$data = array(
			'title'				=> '.:: Data Produk Automotive ::. ',
			'view_automotive'	=> $view_automotive,
			'titlesistem'		=> $this->model->getTitle(),
		);
			
		$this->load->view('front/header',$data);
		$this->load->view('front/view_automotive');
		$this->load->view('front/footer');
	}

	function view_produk_musical()
	{
		
		$view_produk_musical = $this->model->selectdata('data_category pr
			JOIN data_product p ON p.`category_id` = pr.`category_id`
			JOIN data_produk_rating c ON p.`product_id` = c.`id_product`
			WHERE pr.`category_id` IN
			(
			  SELECT pr.`category_id` FROM data_category pr WHERE pr.`category_id` = 5
			)
			ORDER BY pr.`category_id`')->result_array();

		$data = array(
			'title'				=> '.:: Data Produk Musical Instruments ::. ',
			'view_produk_musical'	=> $view_produk_musical,
			'titlesistem'		=> $this->model->getTitle(),
		);
			
		$this->load->view('front/header',$data);
		$this->load->view('front/view_produk_musical');
		$this->load->view('front/footer');
	}

	function view_musical()
	{
		
		$view_musical = $this->model->selectdata('data_category pr
			JOIN data_product p ON p.`category_id` = pr.`category_id`
			JOIN data_produk_rating c ON p.`product_id` = c.`id_product`
			WHERE pr.`category_id` IN
			(
			  SELECT pr.`category_id` FROM data_category pr WHERE pr.`category_id` = 5
			)
			ORDER BY pr.`category_id`')->result_array();

		$data = array(
			'title'				=> '.:: Data Produk Musical Instruments ::. ',
			'view_musical'	=> $view_musical,
			'titlesistem'		=> $this->model->getTitle(),
		);
			
		$this->load->view('front/header',$data);
		$this->load->view('front/view_musical');
		$this->load->view('front/footer');
	}
}