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
        $this->load->model('Control_model','control');
	}
	public function index()
	{
        $data['lampu'] = $this->control->get('esp')->result();
        // $data['pintu'] = $this->control->get('aksi',['type'=>'pintu'])->result();
        $data['page'] = 'cooladmin/monitoring';                
        
        // echo json_encode($data['lampu']);
        // print_r($data['lampu']);
		$this->load->view('cooladmin/index', $data);
	}
	public function time_set(){
		$this->db->select('time_start');
		$time = $this->db->get('esp')->result();
		$now = date('Y-m-d H:i:s');
		foreach ($time as $tm ) {
			$date = date_create($tm->time_start);
			echo date_format($date,'H:i:s') .'<br>';
			// echo date_create() .'<br>';
			$diff =  date_diff($date,$now);
			echo $diff->h;
			// print_r($tm);
		}
	}
}
