<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_m extends CI_Model{
	
	public function showAllCategories(){
		$this->db->order_by('id', 'parent_id');
		$query = $this->db->get('categories');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function showAllCategoriesForMenu(){
		$this->db->order_by('id', 'parent_id');
		$query = $this->db->get('categories');
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

	public function showAllChildrenCategories(){
		$query = $this->db->query('SELECT * FROM Categories WHERE parent_id = '. htmlspecialchars($_GET["index"]) .'');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addCategories(){
		$field = array(
			'name'=>$this->input->post('txtCategoryName'),
			'url'=>$this->input->post('txtCategoryUrl'),
			'description'=>$this->input->post('txtCategoryDescription'),
			'show_in_main_slider'=>$this->input->post('categorySlider'),
			'parent_id'=>$this->input->post('categoryParent'),
			);
		$this->db->insert('categories', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editCategories(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('categories');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateCategories(){
		$id = $this->input->post('txtId');
		$field = array(
			'name'=>$this->input->post('txtCategoryName'),
			'url'=>$this->input->post('txtCategoryUrl'),
			'description'=>$this->input->post('txtCategoryDescription'),
			'show_in_main_slider'=>$this->input->post('categorySlider'),
			'parent_id'=>$this->input->post('categoryParent'),
		);
		$this->db->where('id', $id);
		$this->db->update('categories', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteCategories(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('categories');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}