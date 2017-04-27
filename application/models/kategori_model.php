<?php

class Kategori_model extends CI_Model {
	
	public function getCategory(){
		$result = array();
		$sql = "select * from data_category dc";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}

	public function getdatabyKategory($kategori){
		$result = array();
		$sql = "
			SELECT 
			    *
			FROM
			    data_category pr
			        JOIN
			    data_product p ON p.category_id = pr.category_id
			        JOIN
			    data_produk_rating c ON p.product_id = c.id_product
			WHERE
			    pr.category_id IN (SELECT 
			            pr.category_id
			        FROM
			            data_category pr
			        WHERE
			            pr.category_id = ?)
			ORDER BY pr.category_id;
		";
		$query = $this->db->query($sql, $kategori);

		if($query->num_rows() > 0){
			$result = $query->result_array();
		}

		return $result;
	}
}