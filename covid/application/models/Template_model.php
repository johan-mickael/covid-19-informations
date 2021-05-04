<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($file)
    {
        $file = base_url("assets/".$file.".json");
        // $file = "./assets/".$file.".json";
        $json = json_decode(file_get_contents($file), true);
        return $json;
    }
}
