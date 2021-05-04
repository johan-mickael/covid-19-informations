<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->data['message']['text'] = null;
        $this->data['message']['type'] = 'primary';
	}
	public function index()
	{
        if(isset($this->session->message)) {
            $this->data['message']['text'] = $this->session->message;
        }
        $this->load->view('Login', $this->data);
	}

    public function login() {
        $input = $this->input->post();
        try {
            $this->Login_model->login($input);
            redirect('/admin/gestion-evolution-covid-19', 'refresh');
        } catch(Exception $e) {
            $this->data['message']['text'] = $e->getMessage();
            $this->data['message']['type'] = 'danger';
            $this->load->view('Login', $this->data);
        }
    }

    public function logout() {
        $this->Login_model->delete_token_login($this->session->token);
        $this->load->view('Login', $this->data);
    }
}
