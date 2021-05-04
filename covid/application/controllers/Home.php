<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Template_model');
	}
	public function index($page = 'Home')
	{
		$json = $this->Template_model->get($page);
		$this->load->view($page, $json);
	}
}
