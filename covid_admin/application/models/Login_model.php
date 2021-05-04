<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->expiration = '+15 minutes';
        date_default_timezone_set('Indian/Antananarivo');
    }

    public function get_data($ref)
    {
        return $this->db->get($ref)->result_array();
    }

    public function login($input)
    {
        $sql = "SELECT * FROM ADMIN WHERE USERNAME='%s' AND PASS='%s'";
        $pass = md5($input['password']);
        $sql = sprintf($sql, $input['username'], $pass);
        $query = $this->db->query($sql);
        $res = $query->row_array();
        if ($res == null) throw new Exception("Accès refusé");

        $token = md5($input['username'] . 'salt' . $input['password']);
        $this->session->set_userdata('token', $token);
        $this->insert_login_token($token);

        return $token;
    }

    public function insert_login_token($token)
    {
        if ($this->is_logged_in($token)) return;
        $now = date('Y-m-d H:i:s');
        $expiration = strtotime($this->expiration, strtotime($now));
        $expiration = date('Y-m-d H:i:s', $expiration);

        $sql = "INSERT INTO LOGIN (TOKEN, EXPIRATION) VALUES ('%s', '%s')";
        $sql = sprintf($sql, $token, $expiration);
        $this->db->query($sql);
        $this->session->set_userdata('token', $token);
    }

    public function is_logged_in($token)
    {
        try {
            if ($this->token_is_valid($token)) return true;
        } catch (Exception $ex) {
            $sql = "SELECT * FROM LOGIN WHERE TOKEN = '{$token}'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            if ($res == null) return false;
            return true;
        }
    }

    public function token_is_valid($token)
    {
        $message = 'Veuillez vous reconnecter.';
        if ($token == null)
            throw new Exception($message, 403);

        $sql = "SELECT EXPIRATION FROM LOGIN WHERE TOKEN = '{$token}'";
        $res = $this->db->query($sql)->row_array();
        if ($res == null)
            throw new Exception($message, 403);

        $expiration = $res['expiration'];
        $now = date('Y-m-d H:i:s');
        $is_valid = $now < $expiration;
        if (!$is_valid) {
            $this->delete_token_login($token);
            throw new Exception($message, 403);
        }

        return $is_valid;
    }

    public function delete_token_login($token)
    {
        $sql = "DELETE FROM LOGIN WHERE TOKEN = '{$token}'";
        $this->db->query($sql);
        $this->session->unset_userdata('token');
    }
}
