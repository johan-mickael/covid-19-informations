<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistics extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Template_model');
        $this->load->model('Statistics_model');
    }

    public function index($page = 'Statistics')
    {
        $json = $this->Template_model->get($page);
        $json['data'] = $this->Statistics_model->get_stat();
        $json['data_sum'] = $this->Statistics_model->get_data('v_resume_evolution')[0];
        $this->load->view($page, $json);
    }

}
