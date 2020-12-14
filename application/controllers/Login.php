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

        if ($username) {
            redirect(base_url('dashboard'),'refresh');
        }
    }
}
