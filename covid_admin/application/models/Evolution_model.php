<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Evolution_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Indian/Antananarivo');
    }

    public function insert($input)
    {
        $new = (strcmp($input['new'], "") == 0) ? 0 : $input['new'];
        $death = (strcmp($input['death'], "") == 0) ? 0 : $input['death'];
        $recovered = (strcmp($input['recovered'], "") == 0) ? 0 : $input['recovered'];

        if($new == 0 && $death == 0 && $recovered == 0) return;

        if(!$this->verify_stat($input['country_id'], $death, $recovered))
            throw new Exception('Insertion des données impossible! raison: [deces+guerison > cas actifs]');

        $date = (strcmp($input['date'], "") == 0) ? date('Y-m-d H:i:s') : $input['date'];

        $sql = "INSERT INTO EVOLUTION (country_id, new, death, recovered, date) VALUES ('%s', '%s', '%s', '%s', '%s')";
        $sql = sprintf($sql, $input['country_id'], $new, $death, $recovered, $date);


        $query = $this->db->query($sql);
        if (!$query) {
            $error = $this->db->error();
            throw new Exception("Verifiez les données.");
        }
    }

    public function verify_stat($country_id, $death, $recovered) {
        $sql = "select active_case from v_sum_evolution_r where country_id = {$country_id}";
        $active_case = $this->db->query($sql)->row_array()['active_case'];
        $dr = $death + $recovered;
        return $active_case >= $dr;
    }

    public function get_data($ref)
    {
        return $this->db->get($ref)->result_array();
    }
}
