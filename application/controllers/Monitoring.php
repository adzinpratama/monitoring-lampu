<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$user_session = $this->session->userdata;
		date_default_timezone_set('Asia/Jakarta');

		if ($this->uri->segment(1) == 'login') {
			if (isset($user_session) && $user_session = TRUE) {
				redirect(site_url('dashboard'));
			}
		} else {
			if (!isset($user_session['logged_in'])) {
				$this->session->sess_destroy();
				redirect(site_url('login'));
			}
		}
		$this->load->model('Control_model', 'control');
	}
	public function index()
	{
		$data['page'] = 'cooladmin/monitoring';		
		$this->load->view('cooladmin/index', $data);
	}	
	public function load(){
		$data['lampu'] = $this->control->get('esp')->result();				
		$this->load->view('cooladmin/data_monitoring', $data);
	}
	public function pake($id,$jam,$menit){
		$this->db->select('penggunaan');
		$this->db->where('id_data',$id);
		$penggunaan = $this->db->get('statistik')->row();
		$now = date('Y-m-d');
		$this->db->set(['penggunaan'=>serialize(['jam'=>$jam,'menit'=>$menit])]);
		if(!$penggunaan){
			$this->db->insert('statistik');
		}
		// $this->db->set()
	}
}
