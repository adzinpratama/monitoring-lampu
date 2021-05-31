<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $_table_name = 'user';
    protected $_primary = 'ID';

    public $rules = array(
        'username' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    );


    function __construct()
    {
        parent::__construct();
    }
    function get($id)
    {

        $this->db->where($this->_primary, $id);
        return $this->db->get($this->_table_name)->row_array();
    }

    function getAll()
    {
        return $this->db->get($this->_table_name)->result();
    }

    function getLogin($where, $orwhere)
    {
        $this->db->where($where)->or_where($orwhere);
        $this->db->limit(1);
        return $this->db->get($this->_table_name)->row();
    }
    function insert($data)
    {

        $this->db->set($data);
        $this->db->insert($this->_table_name);
        $id = $this->db->insert_id();
        return $id;
    }
    function delete($id)
    {
        $this->db->where($this->_primary, $id);
        return $this->db->delete($this->_table_name);
    }
    function update($id, $data)
    {
        $this->db->where($this->_primary, $id);
        $this->db->set($data);
        return $this->db->update($this->_table_name);
    }
    function join($select, $from, $table, $query)
    {
        $this->db->select($select);
        $this->db->from($from);
        $this->db->join($table, $query);
        $query = $this->db->get($this->_table_name);
        return $query->result_array();
    }
}
