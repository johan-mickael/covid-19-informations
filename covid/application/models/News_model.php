<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data($ref)
    {
        return $this->db->get($ref)->result_array();
    }


}
