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
				'titlesistem'	=> $this->model->getTitle(),
		);
		
		$kluster = 4;
		//81-100 = sangat baik
		//70-80 = baik
		//60-69 = cukup
		//40-59 = kurang
		//0-39 = kurang sekali
		$data['c1'] = 4;
		$data['c2'] = 1;
		$data['c3'] = 5;
		$data['c4'] = 2;

		$data_product = $this->db->query('select * from data_product left join rata_rata_cluster on data_product.product_id=rata_rata.product_id');
		$st = "";
		
		$this->db->query('truncate table hasil_cluster');

		foreach($data_product->result() as $s)
		{
			$d1 = abs($s->rata_rata-$data['c1']); //96-90 = 6
			$d2 = abs($s->rata_rata-$data['c2']); // 78 - 75 = 3
			$d3 = abs($s->rata_rata-$data['c3']);
			$d4 = abs($s->rata_rata-$data['c4']);
			
			$array_sort_awal = array($d1,$d2,$d3,$d4);
			$array_sort = $array_sort_awal;
			for ($j=1;$j<=$kluster-1;$j++){//1 4 --> 2
				for ($k=0;$k<=$kluster-2;$k++) {//0 2 --> 1
					if ($array_sort[$k] > $array_sort[$k + 1]){ // $array_sort[0] > $array_sort[1] --> 6 > 3
						$temp = $array_sort[$k]; // 3
						$array_sort[$k] = $array_sort[$k + 1]; // 4
						$array_sort[$k + 1] = $temp; //$array_sort[1] = 4
					}
				}
			}
			
			for ($i = 0; $i < $kluster; $i++){
				for($r = 0; $r < $kluster; $r++)
				{
					if($array_sort[0]==$array_sort_awal[$r])
					{
						if($r==0) $st =  "Sangat Baik";
						else if($r==1) $st =  "Baik";
						else if($r==2) $st =  "Cukup";
						else if($r==3) $st =  "Kurang";
					}
				}
			}
			$this->db->query("insert into hasil_cluster (product_id,predikat,d1,d2,d3,d4) values('".$s->product_id."','".$st."','".$d1."','".$d2."','".$d3."','".$d4."')");
		}

		

		$data['data_product'] = $this->db->query("select * from data_product left join (rata_rata_cluster,hasil_cluster) on data_product.product_id=rata_rata_cluster.product_id and data_product.product_id=hasil_cluster.product_id");

		$this->load->view('admin/header',$data);
		$this->load->view('admin/generate_centroid_rekomendasi');
		$this->load->view('admin/footer');
		}
	}
