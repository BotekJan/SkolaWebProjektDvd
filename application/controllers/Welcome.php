<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('DvdModel');
		$this->data["dropdown"] = $this->DvdModel->getDvdCategories();
	}
	
	public function index()
	{
		$this->data["main"] = 'welcome_message';
		$this->data["title"] = "Home";
		$this->layout->generate($this->data);
	}
}
