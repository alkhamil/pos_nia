<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        $data['title'] = 'Halaman Login';
		$this->load->view('login', $data);
    }
    
    public function do_login()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $user = $this->db->get_where('m_user', ['username'=>$username])->row_object();

        if ($user) {
            if (password_verify($password, $user->password)) {
                $this->session->set_userdata('userdata', $user);
                redirect(base_url('dashboard'),'refresh');
            }else {
                $this->session->set_flashdata('pesan', 'Password tidak cocok!');
                redirect(base_url('login'),'refresh'); 
            }
        }else{
            $this->session->set_flashdata('pesan', 'Akun tidak ditemukan!');
            redirect(base_url('login'),'refresh');
        }
    }

    public function do_logout()
    {
        $this->session->unset_userdata('userdata');
        redirect(base_url('login'), 'refresh');
    }
}
