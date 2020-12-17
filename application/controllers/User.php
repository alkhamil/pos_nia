<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

	public function index()
	{
        $data['title'] = 'User';
        $data['isi'] = 'user/index';
        $data['userdata'] = $this->userdata;
        $data['simpan'] = base_url('user/simpan');
        $data['data'] = base_url('user/data');
        $data['get'] = base_url('user/get_data');
        $data['hapus'] = base_url('user/hapus');
        $data['select_user_type'] = base_url('user/select_user_type');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->User_model->lists(
            'm_user.* , m_user_type.name as user_type_name',
            $where, 
            $this->input->post('length'), 
            $this->input->post('start')
        );
		if($list) {
			foreach ($list as $ls) {
				$no++;
				$row = array();
                $row['no'] = $no;
				$row['username'] = $ls['username'];
				$row['password'] = $ls['password'];
				$row['user_type_name'] = $ls['user_type_name'];
				$row['id'] = $ls['id'];
	
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->User_model->list_count($where, true);
		$data['recordsFiltered'] = $this->User_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function get_data()
    {
        $where['m_user.id'] = $this->input->get('id', TRUE);
        $select = "m_user.*, m_user_type.id as user_type_id, m_user_type.name as user_type_name";
        $join = [
            [
                'table'     => 'm_user_type',
                'on'        => 'm_user_type.id = m_user.user_type_id'
            ]
        ];
        $data['user'] = $this->User_model->get($where, $select, $join);
        
        echo json_encode($data);
    }

    public function simpan()
    {
        $savedata['username'] = $this->input->post('username', TRUE);
        $savedata['password'] = password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT);
        $savedata['user_type_id'] = $this->input->post('user_type_id', TRUE);

        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
			$this->User_model->update($savedata, array('id' => $this->input->post('id', TRUE)));
        } else { 
            //create
			$this->User_model->insert($savedata);
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
        
        redirect(base_url('user'), 'refresh');
    }

    public function hapus()
    {
        $where['id'] = $this->input->get('id', TRUE);
        $this->db->trans_begin();
        $this->User_model->delete($where);

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

    public function select_user_type()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->User_model->order_by = "id";
        $this->User_model->search_field = "name";
        $this->User_model->column_search = "name";
        $this->User_model->table = "m_user_type";
        $data = $this->User_model->list_select($q, $where);
        echo json_encode($data);
    }
}
