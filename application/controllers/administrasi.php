<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrasi extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('login') != TRUE)
		{
			$this->load->view('admin/error');
		}

		$this->load->model('adminmodel');
		$this->load->model('model');
	}

	function index()
	{
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '1')
		{	
			$this->load->view('admin/error');
		}

		else 
		{
			$this->load->model('model');
			$data = array(
				'title'			=> '.:: Selamat Datang Halaman Admin::. ',
				'nama'			=> $sesinya['nama'],
				'petunjuk'		=> $this->model->getPetunjukAdmin(),
				'wewenang'		=> $this->model->getWewenangAdmin(),
				'titlesistem'	=> $this->model->getTitle(),
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/dashboard');
			$this->load->view('admin/footer');
		}
	}

	function data_product_view()
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{	
			$this->load->view('admin/error');
		}

		else
		{
			$data_product = $this->adminmodel->selectdata('data_product LEFT JOIN data_category on data_product.category_id = data_category.category_id')->result_array();

			$data = array(
				'title'			=> '.:: Data Produk ::. ',
				'nama'			=> $sesinya['nama'],
				'data_product'	=> $data_product,
				'titlesistem'	=> $this->model->getTitle(),
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/data/data_product');
			$this->load->view('admin/footer');
		}	
	}

	function data_product_add()
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{	

			$this->load->view('admin/error');
		}

		else 
		{
			$pilih_category = $this->adminmodel->selectdata('data_category order by category_id desc')->result_array();

			$data = array(
				'title'			=> '.:: Tambah Data Produk ::. ',
				'nama'			=> $sesinya['nama'],
				'titlesistem'	=> $this->model->getTitle(),
				'product_id'	=> '',
				'status'		=> 'baru',
				'asin'			=> '',
				'category_id'	=> $pilih_category,
				'product_name'	=> '',
				'product_price'	=> '',
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/data/data_product_form');
			$this->load->view('admin/footer');
		}	
	}

	function data_product_save()
	{
		if($_POST)
		{
			$status 		= $this->input->post('status');
			$product_id		= $this->input->post('product_id');
			$asin			= $this->input->post('asin');
			$category_id	= $this->input->post('category_id');
			$product_name	= $this->input->post('product_name');
			$product_price	= $this->input->post('product_price');

			if($status == 'baru')
			{
				$data = array(
					'asin'			=> $asin,
					'category_id'	=> $category_id,
					'product_name'	=> $product_name,
					'product_price'	=>$product_price,
				);

				$sukses = '
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Sukses!</strong> Data anda telah tesimpan.
					</div>
				';

				$this->session->set_flashdata('sukses', $sukses);
				$this->adminmodel->insertdata('data_product',$data);
				redirect('administrasi/data_product');
			}

			else 
			{
				$data = array(
					'asin'	=> $asin,
					'category_id'	=> $category_id,
					'product_name'	=> $product_name,
					'product_price'=>$product_price,
				);

				$sukses = '
					<div class="alert alert-success">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <strong>Sukses!</strong> Data anda telah diperbarui.
					</div>
				';

				$this->session->set_flashdata('sukses', $sukses);
				$this->adminmodel->updatedata('data_product',$data,array('product_id' => $product_id));
				redirect('administrasi/data_product');
			}
		}

		else 
		{
			$this->load->view('admin/error');
		}
	}

	function data_product_edit($id = '')
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{
				$this->load->view('admin/error');
		}

		else 
		{
			$data_product = $this->adminmodel->selectdata('data_product where product_id = "'.$id.'"')->result_array();
			$pilih_category = $this->adminmodel->selectdata('data_category order by category_id desc')->result_array();

			$data = array(
				'title'			=> '.:: Edit Data Produk ::. ',
				'titlesistem'	=> $this->model->getTitle(),
				'nama'			=> $sesinya['nama'],
				'product_id'	=> $data_product[0]['product_id'],
				'status'		=> 'edit',
				'asin'			=> $data_product[0]['asin'],
				'category_id'	=> $pilih_category,
				'product_name'	=> $data_product[0]['product_name'],
				'product_price'	=> $data_product[0]['product_price'],
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/data/data_product_form');
			$this->load->view('admin/footer');
		}	
	}

	function data_product_del($id = '')
	{
		$hasil	= $this->adminmodel->deldata('data_product',array('product_id' => $id));
		$sukses = '
					<div class="alert alert-success">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <strong>Sukses!</strong> Data anda berhasil dihapus.
					</div>
				';

		$this->session->set_flashdata('sukses', $sukses);
		redirect('administrasi/data_product');
	}

	function data_category_view()
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{	
			$this->load->view('admin/error');
		}

		else
		{
			$data_category = $this->adminmodel->selectdata('data_category order by category_id desc')->result_array();

			$data = array(
				'title'			=> '.:: Data category ::. ',
				'nama'			=> $sesinya['nama'],
				'data_category'	=> $data_category,
				'titlesistem'	=> $this->model->getTitle(),
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/data/data_category');
			$this->load->view('admin/footer');
		}	
	}

	function data_category_add()
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{	
			$this->load->view('admin/error');
		}

		else 
		{
			$data = array(
				'title'			=> '.:: Tambah Data category ::. ',
				'nama'			=> $sesinya['nama'],
				'titlesistem'	=> $this->model->getTitle(),
				'category_id'	=> '',
				'status'		=> 'baru',
				'category_name'	=> '',
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/data/data_category_form');
			$this->load->view('admin/footer');
		}	
	}

	function data_category_save()
	{
		if($_POST)
		{
			$status 		= $this->input->post('status');
			$category_id	= $this->input->post('category_id');
			$category_name	= $this->input->post('category_name');

			if($status == 'baru')
			{
				$data = array(
					'category_name'	=> $category_name,
				);

				$sukses = '
					<div class="alert alert-success">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <strong>Sukses!</strong> Data anda telah tesimpan.
					</div>
				';

				$this->session->set_flashdata('sukses', $sukses);
				$this->adminmodel->insertdata('data_category',$data);
				redirect('administrasi/data_category');
			}

			else
			{
				$data = array(
					'category_name'	=> $category_name,
				);

				$sukses = '
					<div class="alert alert-success">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <strong>Sukses!</strong> Data anda telah diperbarui.
					</div>
				';

				$this->session->set_flashdata('sukses', $sukses);
				$this->adminmodel->updatedata('data_category',$data,array('category_id' => $category_id));
				redirect('administrasi/data_category');
			}
		}

		else
		{
			$this->load->view('admin/error');
		}
	}

	function data_category_edit($id = '')
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{
				$this->load->view('admin/error');
		}

		else 
		{
			$data_category = $this->adminmodel->selectdata('data_category where category_id = "'.$id.'"')->result_array();

			$data = array(
				'title'			=> '.:: Edit Data Kategori ::. ',
				'titlesistem'	=> $this->model->getTitle(),
				'nama'			=> $sesinya['nama'],
				'category_id'	=> $data_category[0]['category_id'],
				'status'		=> 'edit',
				'category_name'	=> $data_category[0]['category_name'],
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/data/data_category_form');
			$this->load->view('admin/footer');
		}	
	}

	function data_category_del($id = '')
	{
		$hasil	= $this->adminmodel->deldata('data_category',array('category_id' => $id));

		$sukses = '
					<div class="alert alert-success">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <strong>Sukses!</strong> Data anda berhasil dihapus.
					</div>
				';

		$this->session->set_flashdata('sukses', $sukses);
		redirect('administrasi/data_category');
	}

	function data_pengunjung_view()
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{
				$this->load->view('admin/error');
		}

		else 
		{
			$data_pengunjung = $this->adminmodel->selectdata('data_pengunjung order by id desc')->result_array();

			$data = array(
				'title'				=> '.:: Data pengunjung ::. ',
				'nama'				=> $sesinya['nama'],
				'data_pengunjung'	=> $data_pengunjung,
				'titlesistem'		=> $this->model->getTitle(),
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/data/data_pengunjung');
			$this->load->view('admin/footer');
		}	
	}

	function data_produk_rating_view()
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{
			$this->load->view('admin/error');
		}

		else 
		{
			$data_produk_rating = $this->adminmodel->selectdata('data_produk_rating INNER JOIN data_pengunjung ON data_produk_rating.user_id = data_pengunjung.id 
			INNER JOIN data_product on data_produk_rating.id_product=data_product.product_id LEFT JOIN data_category on data_product.category_id=data_category.category_id')->result_array();


			$data = array(
				'title'				=> '.:: Data Produk Rating ::. ',
				'nama'				=> $sesinya['nama'],
				'data_produk_rating'=> $data_produk_rating,
				'titlesistem'		=> $this->model->getTitle(),
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/data/data_produk_rating');
			$this->load->view('admin/footer');
		}	
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}

	function generate_awal_rekomendasi()
	{
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{	
			$this->load->view('admin/error');
		}

		else 
		{
			$this->load->model('model');
			$generate_awal_rekomendasi = $this->adminmodel->selectdata('data_category pr
				JOIN data_product p ON p.category_id = pr.category_id
				JOIN data_produk_rating c ON p.product_id = c.id_product
				WHERE pr.category_id IN
				(
				  SELECT pr.category_id FROM data_category pr WHERE pr.category_id = 2
				)
				ORDER BY pr.category_id')->result_array();			
		
			$data = array(
				'title'			=> '.:: Selamat Datang Administrator ::. ',
				'nama'			=> $sesinya['nama'],
				'generate_awal_rekomendasi'=> $generate_awal_rekomendasi,
				'titlesistem'	=> $this->model->getTitle(),
			);

			$this->load->view('admin/header',$data);
			$this->load->view('admin/cluster/generate_awal_rekomendasi');
			$this->load->view('admin/footer');
		}
	}

	function generate_rata_rekomendasi()
	{
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '1')
		{
			$this->load->view('admin/error');
		}

		else 
		{
			$data_rata_rekomendasi = $this->db->get('data_product LEFT JOIN data_produk_rating ON data_product.product_id=data_produk_rating.id_product');
			$v = "";

			if(count($data_rata_rekomendasi->result())<0)
			{
				// $nilai = floor(($s->overall)/1);
				$angka= ($s->overall+$s->product_price)/2;
				$nilai =$angka;
				$v = "insert into rata_rata (product_id,rata_rata) values ('".$s->product_id."','".$nilai."')";
				$this->db->query($v);
			}

			else
			{
				$this->db->query('truncate table rata_rata');

				foreach($data_rata_rekomendasi->result() as $s)
				{
					$angka= ($s->overall+$s->product_price)/2;
					$nilai =$angka;
					$v = "insert into rata_rata (product_id,rata_rata) values ('".$s->product_id."','".$nilai."')";
					$this->db->query($v);
				}
			}
			
			$data = array(
				'title'			=> '.:: Selamat Datang Administrator ::. ',
				'nama'			=> $sesinya['nama'],
				'titlesistem'	=> $this->model->getTitle(),
			);

			$data['data_rata_rekomendasi'] = $this->db->query('select * from data_category c
				JOIN data_product p ON p.category_id = c.category_id
				LEFT JOIN data_produk_rating pr ON p.product_id = pr.id_product left join rata_rata rc on pr.id_product=rc.product_id
				WHERE c.category_id IN
				(
				  SELECT c.category_id FROM data_category c WHERE c.category_id = 2
				)
				ORDER BY c.category_id');

			$this->load->view('admin/header',$data);
			$this->load->view('admin/cluster/generate_rata_rekomendasi');
			$this->load->view('admin/footer');
			}
	}

	function generate_centroid_rekomendasi()
	{
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '1')
		{
			$this->load->view('admin/error');
		}

		else
		{
			$data = array(
				'title'			=> '.:: Selamat Datang Administrator ::. ',
				'nama'			=> $sesinya['nama'],
				'titlesistem'	=> $this->model->getTitle(),);
		
		$kluster = 4;
		$data['c1a'] = (5); 
		$data['c2a'] = (1);
		$data['c3a'] = (3);
		$data['c4a'] = (4);

		$data['c1b'] = (13.95); 
		$data['c2b'] = (78.83);
		$data['c3b'] = (12.95);
		$data['c4b'] = (0.02);




		$generate_centroid_rekomendasi = $this->db->query('select * from data_category c
				JOIN data_product p ON p.category_id = c.category_id
				LEFT JOIN data_produk_rating pr ON p.product_id = pr.id_product left join rata_rata rc on pr.id_product=rc.product_id
				WHERE c.category_id IN
				(
				  SELECT c.category_id FROM data_category c WHERE c.category_id = 2
				)
				ORDER BY c.category_id');
		$st = "";
		
		$this->db->query('truncate table hasil');

		foreach($generate_centroid_rekomendasi->result() as $s)
		{
			$d1 = abs(($s->rata_rata-$data['c1a'])+($s->rata_rata-$data['c1b']));
			$d2 = abs(($s->rata_rata-$data['c2a'])+($s->rata_rata-$data['c2b']));
			$d3 = abs(($s->rata_rata-$data['c3a'])+($s->rata_rata-$data['c3b']));
			$d4 = abs(($s->rata_rata-$data['c4a'])+($s->rata_rata-$data['c4b']));
			
			$array_sort_awal = array($d1,$d2,$d3,$d4);
			$array_sort = $array_sort_awal;
			for ($j=1;$j<=$kluster-1;$j++){
				for ($k=0;$k<=$kluster-2;$k++) {
					if ($array_sort[$k] > $array_sort[$k + 1]){ 
						$temp = $array_sort[$k]; 
						$array_sort[$k] = $array_sort[$k + 1]; 
						$array_sort[$k + 1] = $temp;
					}
				}
			}
			
			for ($i = 0; $i < $kluster; $i++){
				for($r = 0; $r < $kluster; $r++)
				{
					if($array_sort[0]==$array_sort_awal[$r])
					{
						if($r==0) $st =  "Kelompok 1 (c1)";
						else if($r==1) $st =  "Kelompok 2 (c2)";
						else if($r==2) $st =  "Kelompok 3 (c3)";
						else if($r==3) $st =  "Kelompok 4 (c4)";
					}
				}
			}
			$this->db->query("insert into hasil (product_id,predikat,d1,d2,d3,d4) values('".$s->product_id."','".$st."','".$d1."','".$d2."','".$d3."','".$d4."')");
		}


		$data['generate_centroid_rekomendasi'] = $this->db->query(' 
				select data_product.product_id, product_name, overall, rata_rata, d1,d2,d3,d4, predikat 
				FROM data_category LEFT JOIN data_product  ON data_category.category_id = data_product.category_id
				LEFT JOIN data_produk_rating ON data_product.product_id=data_produk_rating.id_product
				JOIN rata_rata ON rata_rata.product_id=data_produk_rating.id_product
				JOIN hasil ON hasil.product_id=data_produk_rating.id_product
				WHERE data_category.category_id IN
				(
					SELECT data_category.category_id FROM data_category WHERE data_category.category_id = 2
				)
				ORDER BY data_category.category_id');

		$this->load->view('admin/header',$data);
		$this->load->view('admin/cluster/generate_centroid_rekomendasi');
		$this->load->view('admin/footer');
		}
	}

	function iterasi_kmeans_rekomendasi()
	{
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{
			$this->load->view('admin/error');
		}

		else
		{
			$this->load->model('model');
			$iterasi_kmeans_rekomendasi = $this->adminmodel->selectdata('data_category c
				JOIN data_product p ON p.category_id = c.category_id
				LEFT JOIN data_produk_rating pr ON p.product_id = pr.id_product left join rata_rata rc on pr.id_product=rc.product_id
				WHERE c.category_id IN
				(
				  SELECT c.category_id FROM data_category c WHERE c.category_id = 2
				)
				ORDER BY c.category_id');

			$data = array(
				'title'			=> '.:: Selamat Datang Administrator ::. ',
				'nama'			=> $sesinya['nama'],
				'iterasi_kmeans_rekomendasi'=> $iterasi_kmeans_rekomendasi,
				'titlesistem'	=> $this->model->getTitle(),
			);

			$this->load->view('admin/header',$data);
			$this->load->view('admin/cluster/iterasi_kmeans_rekomendasi');
			$this->load->view('admin/footer');
		}
	}

	function iterasi_kmeans_lanjut_rekomendasi()
	{
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{
			$this->load->view('admin/error');
		}

		else {
			$data = array(
				'title'			=> '.:: Selamat Datang Administrator ::. ',
				'nama'			=> $sesinya['nama'],
				'titlesistem'	=> $this->model->getTitle(),
			);
				
			$data['iterasi_kmeans_lanjut_rekomendasi'] = $this->adminmodel->selectdata('data_category c
				JOIN data_product p ON p.category_id = c.category_id
				LEFT JOIN data_produk_rating pr ON p.product_id = pr.id_product left join rata_rata rc on pr.id_product=rc.product_id
				WHERE c.category_id IN
				(
				  SELECT c.category_id FROM data_category c WHERE c.category_id = 2
				)
				ORDER BY c.category_id');
			$id = ""; 
			$id = $this->db->query('select max(nomor) as m from hasil_centroid');

			foreach($id->result() as $i)
			{
				$id = $i->m;
			}

			$this->db->where('nomor', $id);
			$data['centroid'] = $this->db->get('hasil_centroid');
			$data['id'] = $id+1;
			
			$it = "";
			$it = $this->db->query('select max(iterasi) as it from centroid_temp');

			foreach($it->result() as $i)
			{
				$it = $i->it;
			}
			
			$it_temp = $it-1;
			$this->db->where('iterasi', $it_temp);
			$it_sebelum = $this->db->get('centroid_temp');
			$c1_sebelum = array();
			$c2_sebelum = array();
			$c3_sebelum = array();
			$c4_sebelum = array();
			$no=0;

			foreach($it_sebelum->result() as $it_prev)
			{
				$c1_sebelum[$no] = $it_prev->c1;
				$c2_sebelum[$no] = $it_prev->c2;
				$c3_sebelum[$no] = $it_prev->c3;
				$c4_sebelum[$no] = $it_prev->c4;
				$no++;
			}
			
			$this->db->where('iterasi', $it);
			$it_sesesudah = $this->db->get('centroid_temp');
			$c1_sesesudah = array();
			$c2_sesesudah = array();
			$c3_sesesudah = array();
			$c4_sesesudah = array();
			$no=0;

			foreach($it_sesesudah->result() as $it_next)
			{
				$c1_sesesudah[$no] = $it_next->c1;
				$c2_sesesudah[$no] = $it_next->c2;
				$c3_sesesudah[$no] = $it_next->c3;
				$c4_sesesudah[$no] = $it_next->c4;
				$no++;
			}
			
			if($c1_sebelum==$c1_sesesudah || $c2_sebelum==$c2_sesesudah || $c3_sebelum==$c3_sesesudah || $c4_sebelum==$c4_sesesudah)
			{
				?>
					<script>
						alert("Proses iterasi berakhir pada tahap ke-<?php echo $it; ?>");
					</script>
				<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."administrasi/iterasi_kmeans_hasil_rekomendasi'>";
			}

			else
			{
				$this->load->view('admin/header',$data);
				$this->load->view('admin/cluster/iterasi_kmeans_lanjut_rekomendasi');
				$this->load->view('admin/footer');
			}
		}
	}

	function iterasi_kmeans_hasil_rekomendasi()
	{
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{
			$this->load->view('admin/error');
		}

		else 
		{
			$iterasi_kmeans_hasil_rekomendasi = $this->adminmodel->selectdata('hasil INNER JOIN data_product on hasil.product_id = data_product.product_id LEFT JOIN data_category ON data_product.category_id=data_category.category_id where data_product.category_id=2');

			$data = array(
				'title'			=> '.:: Selamat Datang Administrator ::. ',
				'nama'			=> $sesinya['nama'],
				'titlesistem'	=> $this->model->getTitle(),
				'iterasi_kmeans_hasil_rekomendasi'	=> $iterasi_kmeans_hasil_rekomendasi,
			);

			$data['q'] = $this->db->query('select * from centroid_temp group by iterasi');

			$this->load->view('admin/header',$data);
			$this->load->view('admin/cluster/iterasi_kmeans_hasil_rekomendasi');
			$this->load->view('admin/footer');
		}
	}

	function item_rating_view()
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{
			$this->load->view('admin/error');
		}

		else 
		{
			$item_rating_view = $this->adminmodel->selectdata('data_category 
				LEFT JOIN data_product  ON data_category.category_id = data_product.category_id
				JOIN rata_rata ON data_product.product_id=rata_rata.product_id
				JOIN data_produk_rating ON rata_rata.product_id=data_produk_rating.id_product
				WHERE data_category.category_id IN
				(
					SELECT data_category.category_id FROM data_category WHERE data_category.category_id = 2
				)
				ORDER BY data_category.category_id')->result_array();


			$data = array(
				'title'				=> '.:: Data Item Rating ::. ',
				'nama'				=> $sesinya['nama'],
				'item_rating_view'=> $item_rating_view,
				'titlesistem'		=> $this->model->getTitle(),
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/similarityItem/item_rating_view');
			$this->load->view('admin/footer');
		}	
	}

	function similarity_item_rating()
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{
			$this->load->view('admin/error');
		}

		else 
		{

			$similarity_item_rating = $this->adminmodel->selectdata('data_category c JOIN data_product p ON c.category_id=p.category_id
				JOIN data_produk_rating pr ON p.product_id=pr.id_product
				JOIN rata_rata rt ON pr.id_product=rt.product_id
				WHERE c.category_id IN
				(
					SELECT c.category_id FROM data_category c WHERE c.category_id = 2
				)
				ORDER BY c.category_id');

			$item1=mysql_query("select p.product_id, p.product_name, overall, category_name 
				FROM data_category c JOIN data_product p ON c.category_id=p.category_id
				JOIN data_produk_rating pr ON p.product_id=pr.id_product
				JOIN rata_rata rt ON pr.id_product=rt.product_id
				WHERE c.category_id IN
				(
					SELECT c.category_id FROM data_category c WHERE c.category_id = 2
				)
				ORDER BY c.category_id LIMIT 0,9");
			$item2=mysql_query("p.product_id, p.product_name, overall, category_name 
				FROM data_category c JOIN data_product p ON c.category_id=p.category_id
				JOIN data_produk_rating pr ON p.product_id=pr.id_product
				JOIN rata_rata rt ON pr.id_product=rt.product_id
				WHERE c.category_id IN
				(
					SELECT c.category_id FROM data_category c WHERE c.category_id = 2
				)
				ORDER BY c.category_id LIMIT 1,10");

			
			$data = array(
				'title'				=> '.:: Similarity Item Rating ::. ',
				'nama'				=> $sesinya['nama'],
				'similarity_item_rating'=> $similarity_item_rating,
				'titlesistem'		=> $this->model->getTitle(),
			);


            $operasi=mysql_query("select sum(item1.overall-item1.rata_rata*item2.overall-item2.rata_rata) / sqrt(sum(pow((item1.overall-item1.rata_rata), 2)))*sqrt(sum(pow((item2.overall-item2.rata_rata),2))))) as similarity ");
            // $atas=SUM(($item1->overall-$item1->rata_rata)*($item2->overall-$item2->rata_rata));
            // $bawah=SQRT(SUM(POW(($item1->overall-$item1->rata_rata),2))*SQRT(SUM(POW(($item2->overall-$item2->rata_rata),2))));
            $nilaiAkhir=$operasi;

            $this->db->query('truncate table similarity_adjusted');
			$v = "insert into similarity_adjusted (product_id1,product_id2,nilai_similarity) values ('".$nilaiP1['item1']."','".$nilaiP2['item2']."','".$nilaiAkhir['similarity']."')";
			$this->db->query($v);

			$data['data_ke_view']= $this->db->query('select * from similarity_adjusted');
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/similarityItem/similarity_item_rating');
			$this->load->view('admin/footer');			

		}	
	}

	function group_rating_view()
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{
			$this->load->view('admin/error');
		}

		else 
		{

			$group_rating_view = $this->adminmodel->selectdata('data_category 
				LEFT JOIN data_product  ON data_category.category_id = data_product.category_id
				JOIN hasil ON data_product.product_id=hasil.product_id
				WHERE data_category.category_id IN
				(
					SELECT data_category.category_id FROM data_category WHERE data_category.category_id = 2
				)
				ORDER BY data_category.category_id');
			
			$data = array(
				'title'				=> '.:: Data Group Rating ::. ',
				'nama'				=> $sesinya['nama'],
				'group_rating_view'=> $group_rating_view,
				'titlesistem'		=> $this->model->getTitle(),
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/similarityGroup/group_rating_view');
			$this->load->view('admin/footer');			

		}	
	}

	function similarity_group_rating()
	{
		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');

		if($sesinya['level'] != '1')
		{
			$this->load->view('admin/error');
		}

		else 
		{

			$group_rating_view = $this->adminmodel->selectdata('data_category 
				LEFT JOIN data_product  ON data_category.category_id = data_product.category_id
				JOIN hasil ON data_product.product_id=hasil.product_id
				WHERE data_category.category_id IN
				(
					SELECT data_category.category_id FROM data_category WHERE data_category.category_id = 2
				)
				ORDER BY data_category.category_id');
			
			$data = array(
				'title'				=> '.:: Data Group Rating ::. ',
				'nama'				=> $sesinya['nama'],
				'group_rating_view'=> $group_rating_view,
				'titlesistem'		=> $this->model->getTitle(),
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/similarityGroup/group_rating_view');
			$this->load->view('admin/footer');			

		}	
	}
}