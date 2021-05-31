<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $user_session = $this->session->userdata;
        $this->load->model('Control_model','control');
        

		if ($this->uri->segment(1) == 'login') {
			if (isset($user_session) && $user_session = TRUE && @$user_session['group'] == 'admin') {
				redirect(site_url('dashboard'));
			}
		} else {
			if (!isset($user_session['logged_in']) || $user_session['group'] != 'admin') {
				$this->session->sess_destroy();
				redirect(site_url('login'));
			}
		}
	}
	public function index()
	{
        $data['lampu'] = $this->control->get('aksi',['type'=>'lampu'])->result();
        $data['pintu'] = $this->control->get('aksi',['type'=>'pintu'])->result();
        $data['page'] = 'control';                
        
        // echo json_encode($data['lampu']);
        // print_r($data['lampu']);
		$this->load->view('index', $data);
    }
    public function get(){

    }
    
    public function aksi(){
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        
        $data = array(
            'username'=>$this->session->userdata['username'],        
            'status'=> $action
        );                  
        $this->db->update('aksi', $data,['id_aksi'=>$id]);                        
        echo json_encode(['status'=>'sukses']);        

    }
    public function coba(){
        echo $this->session->userdata['username'];
    }
}
