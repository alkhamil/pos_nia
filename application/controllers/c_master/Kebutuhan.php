<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kebutuhan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_master/Kebutuhan_model');
    }

	public function index()
	{
        $data['title'] = 'Kebutuhan';
        $data['isi'] = 'v_master/kebutuhan/index';
        $data['userdata'] = $this->userdata;
        $data['simpan'] = base_url('c_master/kebutuhan/simpan');
        $data['data'] = base_url('c_master/kebutuhan/data');
        $data['get'] = base_url('c_master/kebutuhan/get_data');
        $data['hapus'] = base_url('c_master/kebutuhan/hapus');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->Kebutuhan_model->lists(
            'm_kebutuhan.*',
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
				$row['type'] = $ls['type'];
				$row['desc'] = $ls['desc'];
				$row['id'] = $ls['id'];
	
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Kebutuhan_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Kebutuhan_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function get_data()
    {
        $where['m_kebutuhan.id'] = $this->input->get('id', TRUE);
        $select = "m_kebutuhan.*";
        $data['kebutuhan'] = $this->Kebutuhan_model->get($where, $select);
        
        echo json_encode($data);
    }

    public function simpan()
    {
        $savedata['name'] = $this->input->post('name', TRUE);
        $savedata['type'] = $this->input->post('type', TRUE);
        $savedata['desc'] = $this->input->post('desc', TRUE);

        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
			$this->Kebutuhan_model->update($savedata, array('id' => $this->input->post('id', TRUE)));
        } else { 
            //create
            $this->Kebutuhan_model->insert($savedata);
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
        
        redirect(base_url('c_master/kebutuhan'), 'refresh');
    }

    public function hapus()
    {
        $where['id'] = $this->input->get('id', TRUE);
        $this->db->trans_begin();
        $this->Kebutuhan_model->delete($where);

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
