<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komite extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_attribute/Komite_model');
    }

	public function index()
	{
        $data['title'] = 'Komite';
        $data['isi'] = 'v_attribute/komite/index';
        $data['userdata'] = $this->userdata;
        $data['simpan'] = base_url('c_attribute/komite/simpan');
        $data['data'] = base_url('c_attribute/komite/data');
        $data['select_attribute_type'] = base_url('c_attribute/komite/select_attribute_type');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->Komite_model->lists(
            'm_attribute_komite.*, m_attribute_type.name as attribute_type_name',
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
				$row['attribute_type_id'] = $ls['attribute_type_id'];
				$row['attribute_type_name'] = $ls['attribute_type_name'];
				$row['id'] = $ls['id'];
	
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Komite_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Komite_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function simpan()
    {
        $savedata['attribute_type_id'] = $this->input->post('attribute_type_id', TRUE);
        $savedata['name'] = $this->input->post('name', TRUE);

        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
			$this->Komite_model->update($savedata, array('id' => $this->input->post('id', TRUE)));
        } else { 
            //create
            $this->Komite_model->insert($savedata);
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
        
        redirect(base_url('c_attribute/komite'), 'refresh');
    }

    public function select_attribute_type()
    {
        $q = $this->input->get('q');
        $where = ['id'=>1];
        $this->Komite_model->order_by = "id";
        $this->Komite_model->search_field = "name";
        $this->Komite_model->column_search = "name";
        $this->Komite_model->table = "m_attribute_type";
        $data = $this->Komite_model->list_select($q, $where);
        echo json_encode($data);
    }

}
