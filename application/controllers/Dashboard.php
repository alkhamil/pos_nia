<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_master/Lembaga_model');
        $this->load->model('m_transaksi/Pembayaran_model');
        $this->load->model('m_transaksi/Pengeluaran_model');
    }
    

	public function index()
	{
        $data['title'] = 'Dashboard';
        $data['isi'] = 'dashboard/index';
        $data['userdata'] = $this->userdata;
        $data['lembaga'] = $this->Lembaga_model->all();
        $data['data_kiri'] = base_url('dashboard/data_kiri');
        $data['data_kanan'] = base_url('dashboard/data_kanan');
        $this->load->view('layout/wrapper', $data);
    }

    public function data_kiri()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->Pembayaran_model->lists(
            '
                t_pembayaran.*, 
                m_tahun_ajaran.name as tahun_ajaran_name,
                m_lembaga.name as lembaga_name,
                m_siswa.nis as siswa_nis,
                m_siswa.name as siswa_name,
                m_kelas.name as kelas_name,
            ',
            $where, 
            $this->input->post('length'), 
            $this->input->post('start')
        );
		if($list) {
			foreach ($list as $ls) {
				$no++;
				$row = array();
                $row['no'] = $no;
				$row['code'] = $ls['code'];
				$row['tahun_ajaran_name'] = $ls['tahun_ajaran_name'];
				$row['lembaga_name'] = $ls['lembaga_name'];
				$row['siswa_nis'] = $ls['siswa_nis'];
				$row['siswa_name'] = $ls['siswa_name'];
				$row['amount'] = $ls['amount'];
				$row['kelas_name'] = $ls['kelas_name'];
				$row['created_at'] = date('d-M-Y H:i:s', strtotime($ls['created_at']));
				$row['id'] = $ls['id'];
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Pembayaran_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Pembayaran_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function data_kanan()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->Pengeluaran_model->lists(
            '
                t_pengeluaran.*,
                m_tahun_ajaran.name as tahun_ajaran_name,
                m_lembaga.name as lembaga_name,
            ',
            $where, 
            $this->input->post('length'), 
            $this->input->post('start') 
        );
		if($list) {
			foreach ($list as $ls) {
				$no++;
				$row = array();
                $row['no'] = $no;
				$row['code'] = $ls['code'];
				$row['approval_name'] = $ls['approval_name'];
				$row['tahun_ajaran_name'] = $ls['tahun_ajaran_name'];
				$row['lembaga_name'] = $ls['lembaga_name'];
				$row['receive_name'] = $ls['receive_name'];
				$row['amount'] = $ls['amount'];
				$row['created_at'] = date('d-M-Y H:i:s', strtotime($ls['created_at']));
				$row['id'] = $ls['id'];
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Pengeluaran_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Pengeluaran_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }
}
