<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $user_session = $this->session->userdata;

        if ($this->uri->segment(1) == 'login') {
            if (isset($user_session) && $user_session = TRUE && @$user_session['active'] == '1') {
                redirect(site_url('dashboard'));
            }
        } else {
            if (!isset($user_session['logged_in']) || $user_session['active'] != '1') {
                $this->session->sess_destroy();
                redirect(site_url('login'));
            }
        }
    }
    public function index()
    {
        $data['record'] = $this->User_model->getAll();
        $data['page'] = "cooladmin/user";
        $data['script'] = ['user', 'custom'];
        $this->load->view('cooladmin/index', $data);
    }

    public function login()
    {

        $post = $this->input->post(NULL, TRUE);
        $this->pass = $this->input->post('password');

        if (isset($post['email'])) {
            $user_detail = $this->User_model->getLogin(array('username' => $post['email']), array('email' => $post['email']));
        }
        $this->form_validation->set_message('required', '%s kosong,Tolong diisi !');
        $rules = $this->User_model->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('cooladmin/login');
        } else {
            if (!@$user_detail->active) {
                $this->session->set_flashdata('notif', 'User Non-Aktif Hubungi Admin !!');
                $this->load->view('cooladmin/login');
            } else if (@$user_detail->password == crypt($post['password'], @$user_detail->password)) {
                $login_data = array(
                    'ID' => $user_detail->ID,
                    'username' => $user_detail->username,
                    'logged_in' => TRUE,
                    'active' => $user_detail->active,
                    'last_login' => $user_detail->last_login,
                    'group' => $user_detail->group,
                    'email' => $user_detail->email,
                );
                $this->session->set_userdata($login_data);

                if (isset($post['remember'])) {
                    $expire = time() + (86400 * 7);
                    set_cookie('email', $post['email'], $expire, "/");
                    set_cookie('password', $post['password'], $expire, "/");
                }
                $this->db->where('ID', $user_detail->ID);
                $this->db->update('user', ['last_login' => date('Y-m-d H:i:s')]);

                redirect('dashboard');
            } else if (@$user_detail->password) {
                $this->session->set_flashdata('notif', 'Password Yang Anda Masukan Salah !!');
                $this->load->view('cooladmin/login');
            } else {
                $this->session->set_flashdata('notif', ' Email Tidak Terdaftar !!');
                $this->load->view('cooladmin/login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    public function add()
    {
        $post = $this->input->post(null, true);
        $data = [
            'username' => $post['username'],
            'group' => $post['group'],
            'password' => bCrypt($post['password'], 12),
            'email' => $post['email'],
            'telp' => $post['telp'],
            'active' => '1',
        ];
        try {
            $this->User_model->insert($data);            
            $callback['response'] = 'success';
            $callback['message'] = $data['username'].' Berhasil Ditambahkan';
        } catch (Exception $e) {
            $callback['response'] = 'failed';
            $callback['message'] = $e->getMessage();
        }
        echo json_encode($callback);
    }
    public function get()
    {
        $id = $this->input->post('id');
        $record = $this->User_model->get($id);
        echo json_encode(['data' => $record]);
    }


    public function delete()
    {
        $this->db->where('ID', $this->input->post('id'));
        try {
            $this->db->delete('user');
            $callback['response'] = 'success';
            $callback['message'] = 'User Berhasil Dihapus';
        } catch (Exception $e) {
            $callback['response'] = 'failed';
            $callback['message'] = $e->getMessage();
        }
        echo json_encode($callback);
    }
    public function update()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $group = $this->input->post('group');
        $telp = $this->input->post('telp');
        $data = array(
            'username' => $username,
            'email' => $email,
            'group' => $group,
            'telp' => $telp,
        );
        if (!empty($password)) {
            $data['password'] = $password;
        }
        $this->db->set($data);
        $this->db->where('ID', $this->input->post('id'));
        try {
            $this->db->update('user');
            $callback['response'] = 'success';
            $callback['message'] = $username.' Berhasil Diupdate';
        } catch (Exception $e) {
            $callback['response'] = 'failed';
            $callback['message'] = $e->getMessage();
        }

        echo json_encode($callback);
    }

    public function newUser()
    {
        $data = array(
            'username' => 'habib',
            'group' => 'admin',
            'password' => bCrypt('admin', 12),
            'email' => 'habib@gmail.com',
            'active' => 1
        );
        $this->db->set($data);
        $this->db->insert('user');
        echo "sukses";
    }

    public function do_update()
    {
        $post = $this->input->post(null, true);
        $upload_image = $_FILES['image']['name'];

        $data = [
            'username' => $post['username'],
            'full_name' => $post['full_name'],
            'group' => $post['group'],
            'password' => bCrypt($post['password'], 12),
            'email' => $post['email'],
            'phone' => $post['phone'],
            'active' => 1,
        ];

        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './upload/avatars/';
        // $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($upload_image) {
            if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', '<div class="alert alert-info">' . $error . '</div>');
            } else {
                $photo = $this->upload->data('file_name');
                $data['photo'] = $photo;
            }
        }




        $this->User_model->update($post['id'], $data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">Data Berhasil Di Update !</div>');
        redirect('admin/user');
    }

    public function status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $message = $status ? 'Aktif' : 'Non-Aktif';
        try {
            $this->db->set(['active' => $status]);
            $this->db->where(['ID' => $id]);
            $this->db->update('user');
            $callback['response'] = 'success';
            $callback['message'] = 'User Sudah ' . $message;
        } catch (\Throwable $th) {
            //throw $th;
            $callback['response'] = 'failed';
            $callback['message'] = 'Status Gagal Dirubah';
        }
        echo json_encode($callback);
    }
}
