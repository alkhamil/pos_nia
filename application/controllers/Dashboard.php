<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_master/Lembaga_model');
    }
    

	public function index()
	{
        $data['title'] = 'Dashboard';
        $data['isi'] = 'dashboard/index';
        $data['userdata'] = $this->userdata;
        $data['lembaga'] = $this->Lembaga_model->all();
        $this->load->view('layout/wrapper', $data);
    }
}
