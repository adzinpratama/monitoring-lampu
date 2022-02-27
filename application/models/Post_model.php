<?php


class Post_model extends CI_Model
{

    protected $_table_name = 'esp';
    protected $_primary_key = 'id';

    function get($id = null)
    {
        if ($id !== null) {
            $this->db->where($this->_primary_key, $id);
        }
        return $this->db->get($this->_table_name)->result_array();
    }
    function delete($id)
    {
        $this->db->where($this->_primary_key, $id);
        $this->db->delete($this->_table_name);
        return $this->db->affected_rows();
    }
    function create($data)
    {
        $this->db->insert($this->_table_name, $data);
        return $this->db->affected_rows();
    }
    function update($data, $id)
    {
        if ($this->check($id, $data)) {
            return $this->db->update($this->_table_name, $data, [$this->_primary_key => $id]);
            // return $this->db->affected_rows();
        }
        return false;
    }
    public function check($id, $data)
    {
        $this->db->select('data');
        $this->db->where(['id' => $id]);
        $db = $this->db->get('esp')->row();
        // print_r($db->data);
        if ($db->data != $data['data']) {            
            return true;
        }        
        return false;
    }
    function batch_update($data){
        $where = $data['data'] ? '0' : '1';
        $this->db->where('data',$where);
        $this->db->set($data);
        return $this->db->update($this->_table_name);
    }
}
