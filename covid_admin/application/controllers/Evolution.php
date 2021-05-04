<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Evolution extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Evolution_model');
        $this->data['message']['text'] = null;
        $this->data['message']['type'] = null;
        $this->data['country'] = $this->Evolution_model->get_data('country');
    }
    public function index()
    {
        $this->load->view('Evolution', $this->data);
    }

    public function insert()
    {
        try {
            $this->Login_model->token_is_valid($this->session->token);
            $res = $this->Evolution_model->insert($this->input->post());
            $this->data['message']['text'] = 'Les statistiques sont à jour.';
            $this->data['message']['type'] = 'success';
        } catch (Exception $ex) {
            if($ex->getCode() == 403) {
                $this->session->set_userdata('message', 'Veuillez vous reconnecter.');
                redirect('admin/connexion', 'refresh');
                return;
            }
            $this->data['message']['text'] = $ex->getMessage();
            $this->data['message']['type'] = 'danger';
        } finally {
            $this->load->view('Evolution', $this->data);
        }
    }
}
