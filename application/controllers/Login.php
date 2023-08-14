<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_unpas');
    }
    public function index()
    {
        $this->load->view('login/admin');
    }

    function aksi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() != false) {
            $where = array(
                'admin_username' => $username,
                'admin_password' => md5($password)
            );
            $data = $this->m_unpas->edit_data($where, 'admin');
            $d = $this->m_unpas->edit_data($where, 'admin')->row();
            $cek = $data->num_rows();
            if ($cek > 0) {
                $session = array(
                    'id' => $d->admin_id,
                    'nama' => $d->admin_nama,
                    'status' => 'login'
                );
                $this->session->set_userdata($session);
                redirect(base_url() . 'dashboard');
            } else {
                redirect(base_url() . 'login?pesan=gagal');
            }
        } else {
            $this->load->view('login/admin');
        }
    }
}
