<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

		if ($this->uri->segment(1) == 'login') {
			if (isset($user_session) && $user_session = TRUE && @$user_session['active'] == 1) {
				redirect(site_url('dashboard'));
			}
		} else {
			if (!isset($user_session['logged_in']) || $user_session['active'] != 1) {
				$this->session->sess_destroy();
				redirect(site_url('login'));
			}
		}
	}
	public function index()
	{
		$this->load->model('Control_model','model');
		
		$data['page'] = 'cooladmin/dashboard';
		$data['user'] = $this->model->get('user')->num_rows();
		$this->db->where('data','1');		
		$data['lampu'] = $this->db->get('esp')->num_rows();
		// $data['lampu'] = $this->model->get('aksi',['type'=>'lampu','status'=>'On'])->num_rows();
		// $data['pintu'] = $this->model->get('aksi',['type'=>'pintu','status'=>'Unkey'])->num_rows();
		
		$this->load->view('cooladmin/index', $data);
	}
}
