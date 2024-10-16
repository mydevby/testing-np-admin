<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Categories extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('categories_m', 'm');
	}

	function index(){
		$this->load->view('layoutAdmin/header');
		$this->load->view('categories/index');
		$this->load->view('layoutAdmin/footer');
	}

	public function showAllCategories(){
		$result = $this->m->showAllCategories();
		echo json_encode($result);
	}

	public function showAllCategoriesForMenu(){
		$result = $this->m->showAllCategoriesForMenu();
		echo json_encode($result);
	}

    public function showAllParentCategories(){
        $result = $this->m->showAllParentCategories();
		echo json_encode($result);
    }

	public function addCategories(){
		$result = $this->m->addCategories();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editCategories(){
		$result = $this->m->editCategories();
		echo json_encode($result);
	}

	public function updateCategories(){
		$result = $this->m->updateCategories();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteCategories(){
		$result = $this->m->deleteCategories();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}