<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_m extends CI_Model{
	
	public function showAllProducts(){
		$this->db->order_by('id');
		$query = $this->db->get('products');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function showAllParentCategories(){
		$query = $this->db->query("SELECT * FROM Categories WHERE parent_id = 0");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addProducts(){
		$field = array(
			'name'=>$this->input->post('txtProductName'),
			'image'=>$this->input->post('txtProductImage'),
			'description'=>$this->input->post('txtProductDescription'),
			'count'=>$this->input->post('txtProductCount'),
			'category'=>$this->input->post('categoryParent'),
            'price'=>$this->input->post('txtProductPrice'),
            'rating'=>$this->input->post('txtProductRating'),
			);
		$this->db->insert('products', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editProducts(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('products');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateProducts(){
		$id = $this->input->post('txtId');
		$field = array(
			'name'=>$this->input->post('txtProductName'),
			'image'=>$this->input->post('txtProductImage'),
			'description'=>$this->input->post('txtProductDescription'),
			'count'=>$this->input->post('txtProductCount'),
			'category'=>$this->input->post('categoryParent'),
            'price'=>$this->input->post('txtProductPrice'),
            'rating'=>$this->input->post('txtProductRating'),
		);
		$this->db->where('id', $id);
		$this->db->update('products', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteProducts(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('products');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}