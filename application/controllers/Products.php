<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Products extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('products_m', 'm');
	}

	function index(){
		$this->load->view('layoutAdmin/header');
		$this->load->view('products/index');
		$this->load->view('layoutAdmin/footer');
	}

	public function showAllProducts(){
		$result = $this->m->showAllProducts();
		echo json_encode($result);
	}

    public function showAllParentCategories(){
        $result = $this->m->showAllParentCategories();
		echo json_encode($result);
    }

	public function addProducts(){
		$result = $this->m->addProducts();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editProducts(){
		$result = $this->m->editProducts();
		echo json_encode($result);
	}

	public function updateProducts(){
		$result = $this->m->updateProducts();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteProducts(){
		$result = $this->m->deleteProducts();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}