<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lainnya extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_attribute/Lainnya_model');
    }

	public function index()
	{
        $data['title'] = 'Lainnya';
        $data['isi'] = 'v_attribute/lainnya/index';
        $data['userdata'] = $this->userdata;
        $data['simpan'] = base_url('c_attribute/lainnya/simpan');
        $data['data'] = base_url('c_attribute/lainnya/data');
        $data['get'] = base_url('c_attribute/lainnya/get_data');
        $data['hapus'] = base_url('c_attribute/lainnya/hapus');
        $data['select_attribute_type'] = base_url('c_attribute/lainnya/select_attribute_type');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->Lainnya_model->lists(
            'm_attribute_lainnya.*, m_attribute_type.name as attribute_type_name',
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
		$data['recordsTotal'] = $this->Lainnya_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Lainnya_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function get_data()
    {
        $where['m_attribute_lainnya.id'] = $this->input->get('id', TRUE);
        $select = "m_attribute_lainnya.*, m_attribute_type.name as attribute_type_name";
        $join = [
            [
                'table'     => 'm_attribute_type',
                'on'        => 'm_attribute_type.id = m_attribute_lainnya.attribute_type_id'
            ]
        ];
        $data['lainnya'] = $this->Lainnya_model->get($where, $select, $join);
        
        echo json_encode($data);
    }

    public function simpan()
    {
        $savedata['attribute_type_id'] = $this->input->post('attribute_type_id', TRUE);
        $savedata['name'] = $this->input->post('name', TRUE);

        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
			$this->Lainnya_model->update($savedata, array('id' => $this->input->post('id', TRUE)));
        } else { 
            //create
            $this->Lainnya_model->insert($savedata);
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
        
        redirect(base_url('c_attribute/lainnya'), 'refresh');
    }

    public function hapus()
    {
        $where['id'] = $this->input->get('id', TRUE);
        $this->db->trans_begin();
        $this->Lainnya_model->delete($where);

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


    public function select_attribute_type()
    {
        $q = $this->input->get('q');
        $where = ['id'=>3];
        $this->Lainnya_model->order_by = "id";
        $this->Lainnya_model->search_field = "name";
        $this->Lainnya_model->column_search = "name";
        $this->Lainnya_model->table = "m_attribute_type";
        $data = $this->Lainnya_model->list_select($q, $where);
        echo json_encode($data);
    }

}
