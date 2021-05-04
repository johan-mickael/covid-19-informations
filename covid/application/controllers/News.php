<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Template_model');
        $this->load->model('News_model');
    }

    public function index($page = 'News')
    {
        $json = $this->Template_model->get($page);
        $json['news'] = $this->News_model->get_data('news');
        $this->load->view($page, $json);
    }

}
