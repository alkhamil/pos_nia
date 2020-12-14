<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tahun_ajaran_model');
    }

	public function index()
	{
        $data['title'] = 'Halaman Tahun Ajaran';
        $data['isi'] = 'tahun_ajaran/index';
        $data['simpan'] = base_url('tahun_ajaran/simpan');
        $data['data'] = base_url('tahun_ajaran/data');
        $data['get'] = base_url('tahun_ajaran/get_data');
        $data['hapus'] = base_url('tahun_ajaran/hapus');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->Tahun_ajaran_model->lists(
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
				$row['status'] = $ls['status'];
				$row['id'] = $ls['id'];
	
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Tahun_ajaran_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Tahun_ajaran_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function get_data()
    {
        $where['id'] = $this->input->get('id', TRUE);
        $select = "*";
        $data['tahun_ajaran'] = $this->Tahun_ajaran_model->get($where, $select);
        
        echo json_encode($data);
    }

    public function simpan()
    {
        $savedata['name'] = $this->input->post('name', TRUE);
        $savedata['desc'] = $this->input->post('desc', TRUE);
        $savedata['status'] = $this->input->post('status', TRUE);

        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
			$this->Tahun_ajaran_model->update($savedata, array('id' => $this->input->post('id', TRUE)));
        } else { 
            //create
            $this->Tahun_ajaran_model->insert($savedata);
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
        
        redirect(base_url('Tahun_ajaran'), 'refresh');
    }

    public function hapus()
    {
        $where['id'] = $this->input->get('id', TRUE);
        $this->db->trans_begin();
        $this->Tahun_ajaran_model->delete($where);

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
