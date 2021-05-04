<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class News_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Indian/Antananarivo');
    }

    public function insert($input)
    {
        $sql = "INSERT INTO NEWS (TITLE, CONTENT, IMAGELINK, DATE) VALUES ('%s', '%s', '%s', '%s')";
        $date = (strcmp($input['date'], "") == 0) ? date('Y-m-d H:i:s') : $input['date'];
        $sql = sprintf($sql, $input['title'], $input['content'], $input['imagelink'], $date);
        $query = $this->db->query($sql);
    }

    public function get_data($ref)
    {
        return $this->db->get($ref)->result_array();
    }
}
