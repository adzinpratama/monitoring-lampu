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
        $data= $this->input->get('data');
        $sekarang = date('Y-m-d H:i:s');
        // echo $sekarang;
        $send['data'] = $data;
        $data ? $send['time_start'] = $sekarang : $send['time_end'] = $sekarang;
        // echo json_encode($send);die();
        $this->db->set($send);
        $this->db->where(['id'=>$id]);
        if($this->db->update('esp')){
            echo 'sukses';
        }
	}
}
