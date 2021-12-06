<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Post_model', 'model');
    }

    function index_get()
    {
        $id = $this->get('id');
        $data = $this->get('data');
        $sekarang = date('Y-m-d H:i:s');
        // $user = $this->model->get();
        $send['data'] = $data;
        $data ? $send['time_start'] = $sekarang : $send['time_end'] = $sekarang;        

        if ($this->model->update($send, $id)) {
            $this->response([
                'status' => true,
                'data'=>$send,
                'message' => 'Data Sudah DiUpdate'
            ], 202);
        } else {
            $this->response([
                'status' => false,
                'Message' => 'Data Sudah ada/ Koneksi Error'
            ], 400);
        }
    }
    function batch_get(){        
        $data=$this->get('data');
        $sekarang = date('Y-m-d H:i:s');        
        $send['data'] = $data;
        $data ? $send['time_start'] = $sekarang : $send['time_end'] = $sekarang;
        if($this->model->batch_update($send)){
            $this->response([
                'status' => true,            
                'data'=>$data,
                'message' => 'Data Sudah DiUpdate'
            ], 202);
        }else{
            $this->response([
                'status' => false,
                'Message' => 'Data Sudah ada/ Koneksi Error'
            ], 400);
        }
    }    
}
