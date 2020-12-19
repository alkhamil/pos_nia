<?php

use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Object_;

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');
        $this->load->model('Lembaga_model');
        $this->load->model('Siswa_model');
        $this->load->model('Kelas_model');
    }

	public function index()
	{
        $data['title'] = 'Pembayaran';
        $data['isi'] = 'pembayaran/index';
        $data['userdata'] = $this->userdata;
        $data['simpan'] = base_url('pembayaran/simpan');
        $data['data'] = base_url('pembayaran/data');
        $data['select_lembaga'] = base_url('pembayaran/select_lembaga');
        $data['select_siswa'] = base_url('pembayaran/select_siswa');
        $data['select_kelas'] = base_url('pembayaran/select_kelas');
        $data['get'] = base_url('pembayaran/get_data');
        $data['hapus'] = base_url('pembayaran/hapus');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->Pembayaran_model->lists(
            '*',
            $where, 
            $this->input->post('length'), 
            $this->input->post('start')
        );
		if($list) {
			foreach ($list as $ls) {
				$no++;
				$row = array();
                $row['no'] = $no;
				$row['name'] = $ls['name'];
				$row['desc'] = $ls['desc'];
				$row['saldo'] = $ls['saldo'];
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

    public function get_data()
    {
        $where['id'] = $this->input->get('id', TRUE);
        $select = "*";
        $data['Pembayaran'] = $this->Pembayaran_model->get($where, $select);
        
        echo json_encode($data);
    }

    public function simpan()
    {
        $savedata['name'] = $this->input->post('name', TRUE);
        $savedata['desc'] = $this->input->post('desc', TRUE);

        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
			$this->Pembayaran_model->update($savedata, array('id' => $this->input->post('id', TRUE)));
        } else { 
            //create
            $this->Pembayaran_model->insert($savedata);
        }
        
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $msg = array(
                'type' => 'error',
                'msg' => 'Data tidak berhasil disimpan',
            );
        }else {
            $this->db->trans_commit();
            $msg = array(
                'type' => 'success',
                'msg' => 'Data Berhasil disimpan',
            );
        }
        $this->session->set_flashdata('msg', $msg);
        
        redirect(base_url('Pembayaran'), 'refresh');
    }

    public function select_lembaga()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Pembayaran_model->order_by = "id";
        $this->Pembayaran_model->search_field = "name";
        $this->Pembayaran_model->column_search = "name";
        $this->Pembayaran_model->table = "m_lembaga";
        $data = $this->Pembayaran_model->list_select($q, $where);
        echo json_encode($data);
    }

    public function select_siswa()
    {
        $where['m_siswa.lembaga_id'] = $this->input->get('id',TRUE);
        $select = '
                m_siswa.*,
                m_lembaga.id as lembaga_id,
                m_lembaga.name as lembaga_name,
                ';
        $join = [
            [
                'table'     => 'm_lembaga',
                'on'        => 'm_lembaga.id = m_siswa.lembaga_id '
            ]
        ];
        $data = $this->Siswa_model->get_all($where,$select,$join);
        echo json_encode($data);
    }

    public function select_kelas()
    {
        $where['tingkat'] = $this->input->get('tingkat',TRUE);
        $select = '*';
        $data = $this->Kelas_model->get_all($where,$select);
        echo json_encode($data);
    }

    public function hapus()
    {
        $where['id'] = $this->input->get('id', TRUE);
        $this->db->trans_begin();
        $this->Pembayaran_model->delete($where);

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $msg = array(
                'type' => 'error',
                'msg' => 'Data tidak terhapus.',
            );
        }else{
            $this->db->trans_commit();
            $msg = array(
                'type' => 'success',
                'msg' => 'Data berhasil terhapus.',
            );
        }
        echo json_encode($msg);
    }

}
