<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistics_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data($ref)
    {
        return $this->db->get($ref)->result_array();
    }

    public function get_stat() {
        $sql = "select * from v_sum_evolution_r order by confirmed desc, death desc, recovered asc";
        return $this->db->query($sql)->result_array();
    }


}
