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
		date_default_timezone_set('Asia/Jakarta');
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
		$this->load->model('Control_model', 'model');

		$data['page'] = 'cooladmin/dashboard';
		$data['user'] = $this->model->get('user')->num_rows();
		$this->db->where('data', '1');
		$data['lampu'] = $this->db->get('esp')->num_rows();

		$this->load->view('cooladmin/index', $data);
	}
	public function diff($start, $end = NULL)
	{
		$awal  = date_create($start);
		if ($end) {
			$akhir = date_create($end);
		} else {
			$akhir = date_create();
		}
		return date_diff($awal, $akhir);
	}
	public function statistic()
	{
		$dbs = $this->db->get('esp')->result();
		foreach ($dbs as $db) {
			$start = $db->time_start;
			$end = $db->time_end;
			if ($db->data) {
				$diff = $this->diff($start);
			} else {
				$diff = $this->diff($start, $end);
			}
			$data['id_data'] = $db->id;
			$penggunaan['hari'] = $diff->d;
			$penggunaan['jam'] = $diff->h;
			$penggunaan['menit'] = $diff->i;
			$data['penggunaan'] = serialize($penggunaan);
			$data['waktu'] = date('Y-m-d H:i:s');
			$send[] = $data;
		}
		try {
			// $this->db->insert_batch('statistik',$send);
			$callback['response'] = 'success';
		} catch (Exception $e) {
			$callback['response'] = $e->getMessage();
		}
		echo json_encode($data);
		// echo json_encode($send);
	}
	public function pake($id){
		$this->db->where('id_data',$id);
		$this->db->order_by('waktu','ASC');
		return $this->db->get('statistik')->row();		
	}

	public function penggunaan(){
		$dbs = $this->db->get('esp')->result();
		foreach ($dbs as $db ) {
			$start = $db->time_start;
			$end = $db->time_end;			
		}
	}
}
