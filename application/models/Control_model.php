<?php defined('BASEPATH') or exit('No direct script access allowed');

class Control_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function get($table,$where=NULL){
        if($where!= NULL){
            $this->db->where($where);
        }
        return $this->db->get($table);        
    }
}