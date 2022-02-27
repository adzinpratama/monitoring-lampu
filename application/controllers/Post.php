<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $id = $this->input->get('id');
        $data = $this->input->get('data');
        $sekarang = date('Y-m-d H:i:s');
        // echo $sekarang;
        $send['data'] = $data;
        $data ? $send['time_start'] = $sekarang : $send['time_end'] = $sekarang;
        if ($this->check($id, $data)) {
            try {
                $this->db->set($send);
                $this->db->where(['id' => $id]);
                $this->db->update('esp');
                $callback['data'] = $send;
                $callback['response'] = 'success';
            } catch (Exception $e) {
                $callback['response'] = $e->getMessage();
            }
        }else{
            $callback['response'] = 'Failed';
        }       
        echo json_encode($callback);
    }

    public function check($id, $data)
    {
        $this->db->select('data');
        $this->db->where(['id' => $id]);
        $db = $this->db->get('esp')->row();
        if ($db->data != $data) {
            return true;
        } else {
            return false;
        }
    }

    public function penggunaan($id){
        $this->db->select('penggunaan');
        $this->db->where('id',$id);
        $this->db->get('esp');
        
    }
    public function coba2(){
        $this->load->model('Post_model','model');
        $this->model->update(['data'=>1],0);
    }
}
