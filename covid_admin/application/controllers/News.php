<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->data['message']['text'] = null;
        $this->data['message']['type'] = null;
    }
    public function index()
    {
        $this->load->view('News', $this->data);
    }

    public function do_upload()
    {
        try {
            $this->Login_model->token_is_valid($this->session->token);
            $config['upload_path']          = './assets/uploads';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('imagelink')) {
                $this->data['message']['text'] = $this->upload->display_errors();
                $this->data['message']['type'] = 'danger';
            } else {
                $data = $this->upload->data();

                $input['imagelink'] = $data['full_path'];
                $input['title'] = $this->input->post('title');
                $input['content'] = $this->input->post('content');
                $input['date'] = $this->input->post('date');

                $this->News_model->insert($input);

                $this->data['message']['text'] = 'Les actualités sont à jour.';
                $this->data['message']['type'] = 'success';
            }
        } catch (Exception $ex) {
            if ($ex->getCode() == 403) {
                $this->session->set_userdata('message', 'Veuillez vous reconnecter.');
                redirect('admin/connexion', 'refresh');
                return;
            }
            $this->data['message']['text'] = $ex->getMessage();
            $this->data['message']['type'] = 'danger';
        } finally {
            $this->load->view('News', $this->data);
        }
    }
}
