<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        $data['title'] = 'Dashboard';
        $data['isi'] = 'dashboard/index';
        $data['userdata'] = $this->userdata;
        $this->load->view('layout/wrapper', $data);
    }
}
